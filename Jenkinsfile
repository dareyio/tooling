pipeline {
  agent any

      environment 
    {
        PROJECT     = 'php-todo'
        ECRURL      = '704771385539.dkr.ecr.us-east-1.amazonaws.com/php-todo'
        DEPLOY_TO = 'development'
    }

  stages {

    stage("Initial cleanup") {
        steps {
        dir("${WORKSPACE}") {
            deleteDir()
        }
        }
    }

    stage('Checkout')
    {
      steps {
      checkout([
        $class: 'GitSCM', 
        doGenerateSubmoduleConfigurations: false, 
        extensions: [],
        submoduleCfg: [], 
        branches: [[name: 'develop']],
        userRemoteConfigs: [[url: "https://github.com/somex6/php-todo.git ",credentialsId:'46403133-dd7c-4075-ad1e-090584927bac']] 	
        ])
        
      }
        }

    stage('Build preparations')
      {
        steps
          {
              script 
                {
                    // calculate GIT lastest commit short-hash
                    gitCommitHash = sh(returnStdout: true, script: 'git rev-parse HEAD').trim()
                    shortCommitHash = gitCommitHash.take(7)
                    // calculate a sample version tag
                    VERSION = shortCommitHash
                    // set the build display name
                    currentBuild.displayName = "#${BUILD_ID}-${VERSION}"
                    IMAGE = "$PROJECT:$VERSION"
                }
            }
      }   

    stage('Build For Dev Environment') {
               when { branch pattern: "^feature.*|^bug.*|^dev", comparator: "REGEXP"}
            
        steps {
            echo 'Build Dockerfile....'
            script {
                sh("eval \$(aws ecr get-login --no-include-email --region us-east-1 | sed 's|https://||')") 
                // sh "docker build --network=host -t $IMAGE -f deploy/docker/Dockerfile ."
                sh "docker build --network=host -t $IMAGE ."
                sh "docker-compose -f tooling.yml up -d"
                cmd = """
                    curl -s -X GET -H 'accept: */*' -w '{http_code}' \
                     'http://localhost:5000' 
                """

                status_code = sh(script: cmd, returnStdout: true).trim()
                // must call trim() to remove the default trailing newline
                            
                echo "HTTP response status code: ${status_code}"

                if (status_code != "200") {
                    error('URL status different of 200. Exiting script.') 
                }
                docker.withRegistry("https://$ECRURL"){
                docker.image("$IMAGE").push("staging-$BUILD_NUMBER") 
                }
            }
        }
    }

    stage('Build For Staging Environment') {
            when {
                expression { BRANCH_NAME ==~ /(staging|develop)/ }
            }
        steps {
            echo 'Build Dockerfile....'
            script {
                sh("eval \$(aws ecr get-login --no-include-email --region us-east-1 | sed 's|https://||')") 
                // sh "docker build --network=host -t $IMAGE -f deploy/docker/Dockerfile ."
                sh "docker build --network=host -t $IMAGE ."
                docker.withRegistry("https://$ECRURL"){
                docker.image("$IMAGE").push("dev-staging-$BUILD_NUMBER")
                }
            }
        }
    }


    stage('Build For Production Environment') {
        when { tag "release-*" }
        steps {
            echo 'Build Dockerfile....'
            script {
                sh("eval \$(aws ecr get-login --no-include-email --region us-east-1 | sed 's|https://||')") 
                // sh "docker build --network=host -t $IMAGE -f deploy/docker/Dockerfile ."
                sh "docker build --network=host -t $IMAGE ."
                docker.withRegistry("https://$ECRURL"){
                docker.image("$IMAGE").push("prod-$BUILD_NUMBER")
                }
            }
        }
    }
  }

        post
    {
        always
        {
            sh "docker rmi -f $IMAGE "
        }
    }
} 