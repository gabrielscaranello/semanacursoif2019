<template>
<div>
    <div class="user_section">
        <div class="row">
            <div class="col-12">
                <div class="img-wrapper" :style="{background: 'url('+this.$store.state.user.picture+')'}"></div>
                <p class="mt-2 mb-1 user_name_max text-center">{{this.$store.state.user.name}}</p>
            </div>
            <div class="leftuser_icons col-12 compact_data">
                <div class="row">
                    <!-- <div class="col-md-3"><a href="#/user_profile" title="User Profile"><i class="fa fa-user-o"></i></a></div> -->
                    <!-- <div class="col-md-3"><a href="#/lockscreen" title="Lock screen"><i class="fa fa-lock" aria-hidden="true"></i></a></div> -->
                    <!-- <div class="col-md-3"><a href="#/edit_user" title="E-mail"><i class="fa fa-cog"></i></a></div> -->
                    <!-- <div class="col-md-3 logout_padd"><a href="#/login" title="Logout"><i class="fa fa-sign-out"></i></a></div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<style scoped lang="scss">
/*user section*/
@import "../../css/customvariables";

.user_section {
    height: 188px;
    padding: 15px 20px;

    .img-wrapper {
        width: 100px;
        border-radius: 50%;
        padding: 7px;
        height: 100px;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: cover !important;
        margin: auto;
    }
    img {
        width: 84px;
        border: 2px solid #ccc;
    }

    p {
        font-size: 15px;
    }
    .leftuser_icons .logout_padd {
        padding: 1px !important;
    }
}
.user_name_max {
    text-transform: uppercase;
    font-weight: 700;
    max-width: 210px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
    margin: 0 0 -4px;
    padding-top: 2px;
    padding-bottom: 5px;
}

.leftuser_icons div {
    cursor: pointer;
    padding: 1px 12px;
    font-size: 18px;
    background-color: transparent;
    margin-right: 3px;
    border-radius: 50px;
    margin: auto;
    width: 100%;
    display: inline;
}
.leftuser_icons i,
.user_name_max {
    color: $menu_color;
}
</style>
