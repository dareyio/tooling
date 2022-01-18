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
        when { branch pattern: "^feature.*|^bug.*|^dev", comparator: "REGEXP"}
         steps {
                    sh '''
                    echo "Deploying the software to Non-Production Environment only from Feature Branch"
                    '''
         }
       }

       stage('Deploy to Integration environment') {
                       when {
                expression { BRANCH_NAME ==~ /(staging|develop)/ }
            }
         steps {
                    sh '''
                    echo "Deploying the software to Integration Environment from Develop branch for further integration tests"
                    '''
         }
       }

// Next stage Must always be above thsi line 
      }
    }
