<div class="login_page_bg py-0">
    <div class="container">
        <div class="customer_login">
            <div id="app-login" class="row justify-content-md-center">

                <!--login area start-->
                <login-form/>
                <!--login area end-->
                
                <div class="loadingio-spinner-pulse-0xjpjhx0lbxl">
                    <div class="ldio-7znirwuftg4">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <span id="status"></span>
            </div>
            
        </div>
    </div>
</div>
<style>
    .account_form input.form-check-input {
        height: 17px;
        position: relative;
        width: 30px;
    }
    .account_form span {
        color: #dd0000;
    }
    .is-danger {
        border-color: #dd0000 !important;
        color: #dd0000 !important;
    }
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }
    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }
    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }
    .modal-body {
        margin: 20px 0;
    }
    .modal-default-button {
        float: right;
    }
    .modal-enter {
        opacity: 0;
    }
    .modal-leave-active {
        opacity: 0;
    }
    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>

<?= $this->Html->script('login/main_v0.1.js', ['type' => 'module']) ?>
<?= $this->Html->script('login/fb_login.js') ?>