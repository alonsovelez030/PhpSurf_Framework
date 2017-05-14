<?= $headers; ?>
<body>
	<div class="container" ng-app="hola">
        <div class="row">
            <div style="margin-top: 50px;" class="col-md-12">
                <h1>HOLA, SOY EL INDEX</h1>
                <ul>
                    <li><a href="<?= $helper->url("Usuarios","users"); ?>" class="btn btn-warning">Usuarios</a></li><br>
                    <li><a href="<?= $helper->url("Usuarios","secondView"); ?>" class="btn btn-info">Second</a></li>
                </ul>
                <div data-ui-view></div>
            </div>
        </div>
    </div>
</body>
<?= $resource_script; ?>
<script type="text/javascript">
    (function(){
        angular.module("hola", ["ngRoute","oc.lazyLoad","ui.router"]).config(configApp);

        configApp.$inject = ["$httpProvider","$stateProvider", "$urlRouterProvider"];
        function configApp($httpProvider, $stateProvider, $urlRouterProvider) {
            $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
            // $routeProvider.when("/list/", {
            //     templateUrl: "/design/js/client_apps/home/templates/_home.html",
            //     controller: "listTasksController",
            //     controllerAs: "list_task"
            // }).otherwise({
            //     redirectTo: "/"
            // });            
            $urlRouterProvider.otherwise("/");

            // Now set up the states
            $stateProvider
            .state("list", {
              url: "/list/",
              templateUrl: "<?= BASE_DIR; ?>/design/js/client_apps/home/templates/_home.html",
              controller: "listTasksController",
              controllerAs: "list_task",
              resolve: { // Any property in resolve should return a promise and is executed before the view is loaded
                loadMyCtrl: ["$ocLazyLoad", function($ocLazyLoad) {
                  return $ocLazyLoad.load('<?= BASE_DIR; ?>/design/js/client_apps/home/controllerTask.js');
                }]
              }
            });
        }
    })();
</script>
<!-- <script type="text/javascript" src='<?= BASE_DIR; ?>/design/js/client_apps/home/controllerTask.js'></script> -->