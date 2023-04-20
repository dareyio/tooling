pipeline {
  agent any
  options {
    buildDiscarder(logRotator(numToKeepStr: '5'))
  }
  environment {
    PATH = '/usr/bin/sh'
    DOCKERHUB_CREDENTIALS = credentials('dockerhub')
  }
  stages {
    stage('Build image for tooling-app') {
      steps {
        sh 'docker build -t stlng/tooling-master:0.0.2 .'
      }
    }
    
    stage('Build container for tooling-app') {
      steps {
        sh 'docker compose -f tooling.yml  up -d'
      }
    }

    stage('Test Stage') {
      steps {
        httpRequest url:"http://localhost:5000", 
        validResponseCodes:'200'
      
        echo "HTTP response status code: ${status_code}"

          if (status_code != "200") {
              error('URL status different from 200. FAILURE')
        }
      }
    }

    stage('Login to docker hub') {
      steps {
        sh 'echo $DOCKERHUB_CREDENTIALS_PSW | docker login -u $DOCKERHUB_CREDENTIALS_USR --password-stdin'
      }
    }

    stage('Push docker image to docker hub registry') {
      steps {
        sh 'docker push stlng/tooling-master:0.0.2'
      }
    }

  post {
    always {
      sh 'docker logout'
    // Clean after build
      sh 'docker compose -f tooling.yml down'
      sh 'docker rmi stlng/tooling-master:0.0.2'
        }
      }
    }
  }
