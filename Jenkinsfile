pipeline {
  agent any

      environment 
    {
        PROJECT     = 'zooto-tooling-prod'
        ECRURL      = '059636857273.dkr.ecr.eu-central-1.amazonaws.com'
        
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
        // branches: [[name: '$branch']],
        userRemoteConfigs: [[url: "https://github.com/darey-devops/tooling.git",credentialsId:'GITHUB_CREDENTIALS']]
        ])
        
      }
        }

    stage('Checkout Flux Deployment Repo For Release')
    {
      steps {
      checkout([
        $class: 'GitSCM', 
        doGenerateSubmoduleConfigurations: false, 
        extensions: [[$class: 'RelativeTargetDirectory', 
            relativeTargetDir: 'release']],
        submoduleCfg: [[url: "https://github.com/darey-devops/helm-tooling-frontend.git",credentialsId:'GITHUB_CREDENTIALS']], 
        branches: [[name: 'master']],
        userRemoteConfigs: [[url: "https://gitlab.com/zooto.io/fluxcd-deployments.git",credentialsId:'GIT_CREDENTIALS']]
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

    // stage("cleanup") {
    //     steps {
    //     dir("${WORKSPACE}") {
    //         deleteDir()
    //     }
    //     }
    // }
 
    }
        post
    {
        always
        {
            sh "docker rmi -f $IMAGE "
        }
    }
} 
