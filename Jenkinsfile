pipeline {
  agent any

  stages {

       stage('Building the software') {
         steps {
             echo 'Building the software'
                    sh '''
                    echo "Building the software"
                    '''
         }
       }

       stage('Unit Testing') {
         steps {
                    sh '''
                    echo "Testing the software (Unit Testing)"
                    '''
                    
                    sh '''
                    echo "Step2"
                    '''
         }
       }

    }


    }
