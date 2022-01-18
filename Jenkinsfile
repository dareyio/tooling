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


       stage('Deploy to Dev environment') {
        when { branch pattern: "feature-\\d+", comparator: "REGEXP"}
         steps {
                    sh '''
                    echo "Deploying the software to Non-Production Environment only from Feature Branch"
                    '''
         }
       }


// Next stage Must always be above thsi line 
      }
    }
