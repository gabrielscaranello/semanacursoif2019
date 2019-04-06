<template>
    <div>
        <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6 text-center">
              <b-card claass="bg-default-card easy_pie_chart1">
                  <div class="row">
                      <div class="col-12 mb-3 mt-3">
                           <div class="row">
                               <div class="col-4 p-t-10 push-1">
                                   <div class="top_border1 bg_color1">
                                   <i class="fa fa-edit circle_round"></i>
                                   </div>
                               </div>
                               <div class="col-8 m-t-10">
                                   <p class="user_font">Inscritos</p>
                                   <p class="number_size">{{data.inscritos}}</p>
                               </div>
                           </div>
                      </div>
                  </div>
              </b-card>
            </div>
            <div class="col-xl-3 col-lg-6  col-sm-6 text-center">
                <b-card claass="bg-default-card easy_pie_chart1">
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-4 p-t-10 push-1">
                                    <div class="top_border4 bg_color4 d-flex align-items-center justify-content-center ml-0">
                                        <i class="fa fa-eye circle_round1"></i>
                                    </div>
                                </div>
                                <div class="col-8 m-t-10">
                                    <p class="user_font">Visitantes</p>
                                    <p class="number_size">{{data.visitantes}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
            <div class="col-xl-3 col-lg-6  col-sm-6 text-center">
                <b-card claass="bg-default-card easy_pie_chart1">
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-4 p-t-10 push-1">
                                    <div class="top_border3 bg_color3">
                                        <i class="fa fa-book circle_round1"></i>
                                    </div>
                                </div>
                                <div class="col-8 m-t-10">
                                    <p class="user_font">Mini Cursos</p>
                                    <p class="number_size">{{data.miniCursos}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 text-center">
                <b-card claass="bg-default-card easy_pie_chart1">
                    <div class="row">
                        <div class="col-12 mb-3 mt-3">
                            <div class="row">
                                <div class="col-4 p-t-10 push-1">
                                    <div class="top_border4 bg_color4">
                                        <i class="fa fa-users circle_round"></i>
                                    </div>
                                </div>
                                <div class="col-8 m-t-10">
                                    <p class="user_font">Palestras</p>
                                    <p class="number_size">{{data.palestras}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import vScroll from "components/plugins/scroll/vScroll.vue";
import chat_data from "../../js/chat_data";



import easyPieChart from "components/plugins/easypiechart/easyPieChart.vue"



require('swiper/dist/css/swiper.css')

var unsub;
export default {
    name: "index",
    data() {
        return {
          data: this.getData(),
        }
    },

    methods: {
      getData() {
        return {
          visitantes: 5,
          miniCursos: 5,
          palestras: 5,
          inscritos: 5,
        };
      }
    },
    mounted() {

        unsub = this.$store.subscribe((mutation, state) => {
            if (mutation.type == "left_menu") {
                this.instances.forEach(function(item, index) {
                    setTimeout(function() {
                        item.resize();
                    });
                });
                setTimeout(() => {
                    this.$refs.chartist.renderChart();
                    this.$refs.swiper.swiper.update();
                });
            }
        });

    },
    beforeRouteLeave (to, from, next) {
        unsub();
        next();
    },
}
</script>

<style scoped src="../../css/index.css"></style>
<style>
.index1_swiper .swiper-pagination-bullet-active {
    background: #fff !important;
}
.swiper-widget{
  padding: 7px;

}
.sales-info{
    color: #636c72;
}
.echarts{
    height: 179px !important;
}
/*socio-tabs*/

.socio-tabs {
    min-height: 370px;
    background-color:#f5f8fa;
}

.socio-tabs .tab-content {
    min-height: 315px;
}

.socio-tabs .nav-item a {
    padding: 15px 0;
    text-align: center;
}

.socio-tabs .nav-tabs li:first-child a.active {
    background-color: #55ACEE;
}

.socio-tabs .nav-tabs li:nth-child(2) a.active {
    background-color: #3B5998;
}

.socio-tabs .nav-tabs li:last-child a.active {
    background-color: #3F729B;
}

.socio-tabs .nav-tabs {
    border-top: 3px solid #FFF;
    border-bottom: 0;
}

.socio-tabs .nav-item {
    width: 33.33%;
}

.socio-tabs .nav-tabs .nav-link,
.socio-tabs .nav-tabs .nav-link:focus,
.socio-tabs .nav-tabs .nav-link:hover {
    border-color: #fff #fff #ddd;
    font-size: 14px;
    color: #777;
}

.socio-tabs .nav-tabs .nav-link.active,
.socio-tabs .nav-tabs .nav-item.show .nav-link {
    border-color: #fff #fff #ddd;
    color: #FFF;
}

.tab-pane .card {
    border-color: #FFF;
    margin:3px 0 0 0;
}

.tab-pane .card-block {
    padding: 12px;
}

.twitter .tweet-img {
    width: 17%;
}
.twitter .tweet {
    width: 83%;
    padding-left: 3%;
}
.swiper-container{
    margin-top: 22px;
}
.swiper-pagination-fraction, .swiper-pagination-custom, .swiper-container-horizontal > .swiper-pagination-bullets{
    bottom: 26px !important;
}
a.prfl-link {
    overflow: hidden;
    display: block;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.twitter .tweet .options {
    margin: 0;
}

.twitter .tweet .options i {
    margin-left: 15px;
    cursor: pointer;
}

.facebook .page-img,
.instagram .page-img {
    width: 17%;
}

.facebook .page-name,
.instagram .page-name {
    width: 83%;
    padding-left: 3%;
}
.fb-friends{
    overflow: hidden;
}
.fb-friends img {
    width: 23%;
    margin: 0 0 5px 2px;
    cursor: pointer;
}
.fb-friends img:hover{
    transform: scale(1.1,1.1);
    transition: 300ms
}
.insta-pins .insta-img {
    width: 49%;
    margin: 0 1px;
    float: left;
    position: relative;
}

.insta-pins .insta-img img {
    width: 100%;
    height: 130px;
}

.insta-pins .insta-img .pic-credits {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 3px 7px;
    color: #555;
    background-color: rgba(255, 255, 255, .6);
}

.task1 {
    padding-bottom: 20px!important;
}

.task1 .btn {
    margin-right: 15px!important;
}


/*========chart============*/

#annual-sales {
    position: relative;
    height: 260px;
}

#annual-sales .ct-grid {
    stroke: rgba(0, 0, 0, .07);
    stroke-width: 1px;
    stroke-dasharray: 0;
}

#annual-sales .ct-label {
    color: rgba(0, 0, 0, .7);
    font-size: 1.1rem;
}

#annual-sales .ct-label.ct-horizontal.ct-end {
    margin-left: -15px;
}

@media screen and (max-width:390px) {
    #annual-sales {
        height: 200px;
    }
    #annual-sales .ct-label.ct-horizontal.ct-end {
        transform: rotate(-45deg);
    }
}

#annual-sales .ct-series-a .ct-line,
#annual-sales .ct-series-a .ct-point {
    stroke: #4FC1E9;
}

#annual-sales .ct-series-b .ct-line,
#annual-sales .ct-series-b .ct-point {
    stroke: #09BD8F;
}

#annual-sales .ct-point {
    stroke-width: 7px;
    cursor: pointer;
}

#annual-sales .ct-series-a .ct-area {
    fill: #BFBFC6;
    fill-opacity: .05
}

#annual-sales .ct-series-b .ct-area {
    fill: #4086C1;
    fill-opacity: .05
}

#annual-sales .ct-line {
    stroke-width: 1px
}


.chartist-tooltip {
    background-color: #0a0a0a;
    color: #FFF;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

.chartist-tooltip:before,
.chartist-tooltip:after {
    content: none;
}

.nav-tabs:focus {
    outline: none;
}

.icon_color {
    color: #22b1e3;
    font-size: 25px;
}

.circle_round{
    font-size: 20px;
}
.circle_round1{
    font-size: 22px;
}
.top_border1{
    width:60px;
    height:60px;
    border-radius: 50%;
    line-height: 4.1;
    font-size: 15px;
    color: #fff;
    box-shadow:1px 1px 20px rgba(75, 156, 228, 0.88);
}
.top_border2{
    width:60px;
    height:60px;
    border-radius: 50%;
    line-height: 4.1;
    font-size: 15px;
    color: #fff;
    box-shadow: 1px 1px 20px rgba(82, 162, 185, 0.86);
}
.top_border3{
    width:60px;
    height:60px;
    border-radius: 50%;
    line-height: 4.1;
    font-size: 15px;
    color: #fff;
    box-shadow: 1px 1px 22px rgb(19, 191, 210);
}
.top_border4{
    width:60px;
    height:60px;
    border-radius: 50%;
    line-height: 4.1;
    font-size: 15px;
    color: #fff;
    box-shadow:1px 1px 20px rgba(23, 96, 160, 0.89);
}
.bg_color1{
    background-color: #4b9ce4;
}
.bg_color2{
    background-color: #328ba7;
}
.bg_color3{
    background-color: #13bfd2;
}
.bg_color4{
    background-color: #1760a0;
}
.number_size{
    font-size: 20px;
    color: #646567;
    margin-bottom: 0 !important;
}
.user_font{
    font-size: 13px;
    color: #646567;
    margin-bottom: 0!important;
}
.m-t-10{
    margin-top: 8px;
}
/*======chartist=========*/
</style>
<style scoped lang="scss">
    /*========================easy pie chart========================*/

.easychart {
    & .chart {
        margin: 2px auto;
        position: relative;
        display: inline-block;
        text-align: center;
    }
    .circle_val {
        display: block;
        font-weight: normal;
        color: #646a6f;
        position: relative;
    }
    .percent {
        display: inline-block;
        z-index: 2;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
}
</style>
