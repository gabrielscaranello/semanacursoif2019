<template>
    <div class="row" id="user_list">
        <div class="col-lg-12">
            <b-card header="Basic Client Table" header-tag="h4" class="bg-primary-card" >
                <div class="table-responsive">
                    <!--<button class='btn btn-info deletable1' id='myid'>check</button>-->
                    <!--<div v-html="windowText"></div>-->
                    <!--<h1>{{someValueSetOnClick}}</h1>-->

                    <datatable title="Registered Users" :rows="tableData" :columns="columndata" >



                    <!--<template>-->
                        <!--<td v-if="columndata.field=='action'">-->
                            <!--<span class="fa fa-edit " v-on:click="mycheck()"></span>-->
                        <!--</td>-->
                    <!--</template>-->
                    </datatable>
                </div>
            </b-card>
        </div>
    </div>
</template>
<script  type="text/javascript">
import Vue from 'vue';
import datatable from "components/plugins/DataTable/DataTable.vue";
import users_list from "../../js/users_list.js"
export default {
    name: "users_list",
    id: "user_list",
    components: {
        datatable
    },
    data() {
        return {
            windowText: null,
            someValueSetOnClick: null,
            tableData: [],
            columndata: [{
                label: 'ID',
                field: 'id',
                numeric: true,
                html: false,
            }, {
                label: 'Name',
                field: 'name',
                numeric: false,
                html: false,
            }, {
                label: 'Phone',
                field: 'phone',
                numeric: false,
                html: false,
            },
                {
                    label: 'Email',
                    field: 'email',
                    numeric: false,
                    html: false,
                },
                {
                    label: 'Age',
                    field: 'age',
                    numeric: true,
                    html: false,
                }, {
                    label: 'Status',
                    field: 'status',
                    numeric: false,
                    html: false,
                }, {
                    label: 'Actions',
                    field: 'action',
                    numeric: false,
                    html: true,
                }]
        }
    },

    // created() {
    //     var test = document.getElementById("myid");
    //     test.setAttribute('v-on:click', 'mycheck');
    // },
    methods: {

        onHtmlClick(event){
            const anchor = event.target.closest(".clickable");
            if (!anchor)
                return;
            alert("you clicked")

        }



    },

    mounted() {

        // setTimeout(()=>{
        //     this.windowText = 'Some text... <a class="action" href="/test"><b>test</b></a>'
        // }, 2000)

        // Add a native event listener to the Vue element.
        // this.$el.addEventListener("click", this.onHtmlClick);


        // document.getElementById("myid").setAttribute("click", "mycheck");

        // this.id = this.$el.getAttribute('data-id').setAttribute("click","myclick");
        //
        // this.id = this.$el.getAttribute('data-id');
        // alert(this.id);


        // Add a native event listener to the Vue element.
        // this.$el.addEventListener("click", this.onHtmlClick)
        axios.get("http://www.filltext.com/?rows=20&id={index}&name={firstName}~{lastName}&email={email}&&phone={phone}&age={numberRange|20,60}&status=[%22Activated%22,%22Deactivated%22]").then(response => {
            this.tableData = response.data;
            this.tableData.forEach((item, index) => {

                this.$set(item, "action", "<button class='btn btn-info clickable'  href='#/edit_user?" + index + "' >Edit</button>");

                    // this.$set(item, "action", "<button class='btn btn-info deletable1' id='myid'>check</button>");
                // this.$el.querySelectorAll('.deletable1').forEach( (button) => {
                //     button.addEventListener("click",(e) => {
                //         this.onHtmlClick
                //     });
                // });
                //


                this.$el.addEventListener("click", this.onHtmlClick)




            });
        })
            .catch(function (error) {
            });
    },






}


</script>

<style type="text/css">
    .democlass{
        color:red;
    }
</style>
