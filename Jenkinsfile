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
        branches: [[name: '$branch']],
        userRemoteConfigs: [[url: "https://github.com/darey-devops/tooling.git",credentialsId:'GITHUB_CREDENTIALS']]
        ])
        
      }
        }

    stage('Checkout Helm chart')
    {
      steps {
      checkout([
        $class: 'GitSCM', 
        doGenerateSubmoduleConfigurations: false, 
        extensions: [[$class: 'RelativeTargetDirectory', 
            relativeTargetDir: 'helm']],
        submoduleCfg: [], 
        branches: [[name: 'master']],
        userRemoteConfigs: [[url: "https://gitlab.com/zooto.io/fluxcd-deployments.git",credentialsId:'GIT_CREDENTIALS']]
        ])
        
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
