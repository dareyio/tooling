pipeline {
  agent any

      environment 
    {
        VERSION = 'latest'
        PROJECT = 'tooling'
        IMAGE   = 'tooling:latest'
        ECRURL  = 'http://489122420391.dkr.ecr.eu-west-2.amazonaws.com'
        ECRCRED = 'ecr:eu-west-2:tooling'

    }

  stages {
          stage('Clean Workspace'){
            steps {
              cleanWs()
            }
          }
    
    stage('Checkout')
    {
      steps {
      checkout([$class: 'GitSCM', 
      doGenerateSubmoduleConfigurations: false, 
      extensions: [], 
      submoduleCfg: [], 
      userRemoteConfigs: [[url: 'https://github.com/propitix/tooling.git']]])

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

        stage('Docker build')
        {
            steps
            {
                script
                {
                    // Build the docker image using a Dockerfile
                    docker.build("$IMAGE")
                }
            }
        }


        stage('Test') 
        {
          steps 
          {
            script 
            {
              // Build
              sh 'echo "Testing Stage"'

            }

          }

        }


        stage('Docker Push')
        {
            steps
            {
                script
                {
                    // login to ECR - for now it seems that that the ECR Jenkins plugin is not performing the login as expected. I hope it will in the future.
                    sh("eval \$(aws ecr get-login --no-include-email | sed 's|https://||')")
                    // Push the Docker image to ECR
                    // docker.withRegistry(ECRURL, ECRCRED) - When the ECR Credentials plugin is fixed, then this can be used
                        docker.withRegistry(ECRURL)
                    {
                        docker.image(IMAGE).push()
                    }
                }
            }
        }
    }

        post
    {
        always
        {
            // make sure that the Docker image is removed
            sh "docker rmi $IMAGE | true"
        }
    }
} 