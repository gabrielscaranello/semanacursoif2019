<template>
    <div class="container-fluid img_backgrond">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 col-xs-10 offset-xs-1 login-content mt-5">
                <div class="row">
                    <div class="col-sm-12 mt-4">
                        <h2 class="text-center">
                            <img src="~img/logo_black.png" alt="Logo">
                        </h2>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <h3 class="page-name text-center">Reset Password</h3>
                    </div>
                </div>
                <vue-form :state="formstate" @submit.prevent="onSubmit">
                    <div class="col-md-12">
                        <p class="user-message"> * The Password is case sensitive.</p>
                        <div class="form-group">
                            <validate tag="div">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                                    </div>
                                    <input v-model="model.password" name="password" type="password" required placeholder="Password" class="form-control" minlength="4"
                                           maxlength="10" />
                                </div>


                                <field-messages name="password" show="$invalid && $submitted" class="text-danger">
                                    <div slot="required">Password is required</div>
                                    <div slot="minlength">Password should be atleast 4 characters long</div>
                                    <div slot="maxlength">Password should be atmost 10 characters long</div>
                                </field-messages>
                            </validate>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <validate tag="div">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                                    </div>
                                    <input v-model="model.repeatPassword" name="repeatpassword" type="password" required placeholder="Confirm Password" class="form-control"
                                           :sameas="model.password">
                                </div>


                                <field-messages name="repeatpassword" show="$invalid && $submitted" class="text-danger">
                                    <div slot="required">Password confirmatoin is required</div>
                                    <div slot="sameas">Password and Confirm password should match</div>
                                </field-messages>
                            </validate>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="form-group">
                            <input type="submit" value="Reset Password" class="btn btn-primary btn-block" />
                        </div>
                    </div>
                </vue-form>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import VueForm from "vue-form";
    import options from "src/validations/validations.js";
    Vue.use(VueForm, options);
    export default {
        name: "resetpassword",
        data() {
            return {
                formstate: {},
                model: {
                    password: "",
                    repeatPassword: ""
                }
            }
        },
        methods: {
            onSubmit: function () {
                if (this.formstate.$invalid) {
                    return;
                } else {
                    this.$router.push("/login");
                }
            }
        },
        mounted: function () {

        },
        destroyed: function () {

        }
    }
</script>
<style scoped>
    .login-content {
        margin-top: 7%;
        margin-bottom: 7%;
        padding-bottom: 20px;
        box-shadow: 0 0 30px #ccc;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-color: #ffffff;
    }

    .img_backgrond {
        background-image: url("../../img/pages/Login-03-01.png");
        background-size: cover;
        height: 100vh;
        width: 100%;
    }

    label {
        font-size: 14px !important;
    }

    ::-webkit-input-placeholder {
        font-size: 14px;
    }

    .user-message {
        padding: 15px 0;
        font-size: 14px;
        color: #777;
    }
    .img_backgrond .input-group-text{
        background-color: white;
    }
    .fa{
        color: #ced4da;
    }

</style>
