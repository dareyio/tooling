pipeline {
  agent any

      environment 
    {
        PROJECT     = 'zooto-tooling-prod'
        ECRURL      = '059636857273.dkr.ecr.eu-central-1.amazonaws.com'
        APP_VERSION_PREFIX = '0.1.'
        
    }

  stages {

    stage('Checkout')
    {
      steps {
      checkout([
        $class: 'GitSCM', 
        doGenerateSubmoduleConfigurations: false, 
        extensions: [],
        submoduleCfg: [], 
        userRemoteConfigs: [[url: "https://github.com/darey-devops/tooling.git",credentialsId:'GITHUB_CREDENTIALS']]
        ])
        
      }
        }

    stage('Checkout Flux Deployment Repo For Release')
    {
      steps {
      checkout(
          [
            $class: 'GitSCM', 
            doGenerateSubmoduleConfigurations: true, 
            userRemoteConfigs: 
            [
                [   url: "https://gitlab.com/zooto.io/fluxcd-deployments.git",
                    credentialsId:'GIT_CREDENTIALS'
                ]
            ],
            extensions: 
                [
                    [   $class: 'RelativeTargetDirectory', 
                        relativeTargetDir: 'FluxHelmRelease'
                    ]
                ],
            branches: 
                [
                    [   name: 'master' 
                    ]
                ]
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
                sh("eval \$(aws ecr get-login --no-include-email --region eu-central-1 | sed 's|https://||')") 
                // sh "docker build --network=host -t $IMAGE -f deploy/docker/Dockerfile ."
                sh "docker build --network=host -t $IMAGE ."
                docker.withRegistry("https://$ECRURL"){
                docker.image("$IMAGE").push("dev-$BUILD_NUMBER")
            }
            }
        }
      }

    stage('Build For Staging Environment') {
               when {
                expression { BRANCH_NAME ==~ /(staging|develop|main)/ }
            }
        steps {
            echo 'Build Dockerfile....'
            script {
                sh("eval \$(aws ecr get-login --no-include-email --region eu-central-1 | sed 's|https://||')") 
                // sh "docker build --network=host -t $IMAGE -f deploy/docker/Dockerfile ."
                sh "docker build --network=host -t $IMAGE ."
                docker.withRegistry("https://$ECRURL"){
                docker.image("$IMAGE").push("staging-$BUILD_NUMBER")
            }
            }
        }
    }

    stage('Build For Production Environment') {
        when { tag "release-*" }
        steps {
            echo 'Build Dockerfile....'
            script {
                sh("eval \$(aws ecr get-login --no-include-email --region eu-central-1 | sed 's|https://||')") 
                // sh "docker build --network=host -t $IMAGE -f deploy/docker/Dockerfile ."
                sh "docker build --network=host -t $IMAGE ."
                docker.withRegistry("https://$ECRURL"){
                docker.image("$IMAGE").push("prod-$BUILD_NUMBER")
            }
            }
        }
    }

      stage('Update Helm appVersion') {
        steps {
                 
            echo 'Update appVersion'
            sh '''
                  cat FluxHelmRelease/charts/helm-tooling-frontend/Chart.yaml | sed "s/appVersion: .*/appVersion: \"$APP_VERSION_PREFIX${BUILD_NUMBER}\"/g" > FluxHelmRelease/charts/helm-tooling-frontend/Chart.yaml

              '''
            sh 'cd FluxHelmRelease/charts/helm-tooling-frontend'
            sh "git checkout master"
            // sh 'git merge master'
            sh 'git commit -am "Promote app version $APP_VERSION_PREFIX${BUILD_NUMBER} "'
            sh 'git push'
        }
      }



    // stage("cleanup") {
    //     steps {
    //     dir("${WORKSPACE}") {
    //         deleteDir()
    //     }
    //     }
    // }
 
    }
    //     post
    // {
    //     always
    //     {
    //         sh "docker rmi -f $IMAGE "
    //     }
    // }
} 
