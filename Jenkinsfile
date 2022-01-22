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

       stage('Quality Gate') {
         steps {
                    sh '''
                    echo "Implementing Quality Gate Checks"
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
                expression { BRANCH_NAME ==~ /(integration|develop|master)/ }
            }
         steps {
                    sh '''
                    echo "Deploying the software to Integration Environment from Develop branch for further integration tests"
                    '''
         }
       }

       stage('Run Integration tests') {
                       when {
                expression { BRANCH_NAME ==~ /(integration|develop|master)/ }
            }
         steps {
                    sh '''
                    echo "Run Integration Tests"
                    '''
         }
       }


       stage('Deploy to pre-production') {
        when { buildingTag() }
         steps {
                    sh '''
                    echo "Deploying the software to Production Environment from Master branch or a Git Tag"
                    '''
         }
       }

       stage('Deploy to Production') {
        when { buildingTag() }
        //   input{
        //         message "Do you want to proceed for production deployment?"
        //     }
        script {
              timeout(time: 10, unit: 'MINUTES') {
                input(id: "Deploy Gate", message: "Deploy ${params.project_name}?", ok: 'Deploy')
              }
         steps {
                    sh '''
                    echo "Deploying the software to Production Environment from Master branch or a Git Tag"
                    '''
         }
       }

// Next stage Must always be above thsi line 
      }
    }
