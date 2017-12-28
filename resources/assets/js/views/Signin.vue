<template>
    <div>
        <div class="logo-header">
            <img  style="width:auto;margin-top:0" class="ui middle aligned image" src="" />
            <span class="content">
                xxxxxxxxxxxxxxxxxx
            </span>
        </div>
        <div class="bg">
            <img src="" alt="">
        </div>
        <div class="segment">
            <h3 class="ui header">用户登录</h3>
            <el-form class="ui form">
                <div class="field">
                    <input class="effect" type="text" v-model="login.name">
                    <label>用户名</label>
                    <span class="focus-border cube"></span>
                </div>
                <div class="field">
                    <input class="effect" type="password" v-model="login.password">
                    <label>密码</label>
                    <span class="focus-border cube"></span>
                </div>
                <div class="login-button" @click="signin">登录</div>
            </el-form>
        </div>
        <div class="footer">
            @2017 xxxxxxxxxxxxxxxxxxxx
        </div>
    </div>
</template>
<script>
 export default {
     data() {
         return {
             login: {
                 name: '',
                 password: '',
             },
         }
     },
     created(){
     },
     methods: {
         signin(event){
             let name = this.login.name;
             let password = this.login.password;
             this.$http.post('/api/signin',  {
                         name: name,
                         password: password
                       })
             .then((res) => {
                     console.log('success');
                 if(res.data.success){
                     sessionStorage.setItem('name', name);
                     sessionStorage.setItem('token', res.data.data.token);
                     this.$http.get('/api/menu').then((res) => {
                            
                         window.sessionStorage.routes = JSON.stringify(res.data)
                         var menuItems = generateMenuItems(res.data)

                         this.$store.commit('delete_menu')
                         if (this.$store.state.menus.items.length <= 0) { // 避免注销后在不刷新页面的情况下再登录重复加载路由
                             this.$store.commit('add_menu', menuItems)
                             // 动态加载路由关键2行
                             var newRoute = fetchRoutes(menuItems)
                             this.$router.options.routes[0].children.push(...fetchRoutes(menuItems))
                             this.$router.addRoutes(this.$router.options.routes)
                         }
                     });
                     this.$message.success('恭喜你，登录成功');
                     this.$router.push('/')
                 }else{
                     this.$message.error(res.data.message);
                 }
             });
         }
     }
 }

function generateMenuItems (menu = [], menuItems = []) {
    for (let i = 0, l = menu.length; i < l; i++) {
        let item = menu[i]
        if (item.route.path) {
            item.route.component = resolve => require([`views/` + item.route.component_path + `.vue`], resolve)
            if (item.children) {
                for (let j = 0, len = item.children.length; j < len; j++) {
                    item.children[j].route.component = resolve => require([`views/` + item.children[j].route.component_path + `.vue`], resolve)
                }
            }
        }
        menuItems.push(item)
    }
    return menuItems
}

function fetchRoutes(menus = []) {
    let routes = [];
    for (let i = 0; i < menus.length; i++) {
        if (menus[i].route.path) {
            routes.push(menus[i].route);
        }
        if (menus[i].children) {
            routes[i].children = fetchRoutes(menus[i].children);
        }
    }
    return routes;
}

</script>
<style scoped>
 body{
     background-color: rgb(249,249,249);
 }

 .logo-header{
     padding: 50px;
 }

 .logo-header img,.logo-header .content{
     float: left;
 }

 .content{
     margin-left: 20px;
     font-weight: lighter;
     font-size: 30px;
     color: #3e3d3d;
 }


 .footer{
     height: 50px;
     position: fixed;
     bottom: 0px;
     left: 0px;
     text-align: center;
     color: #3e3d3d;
     width: 100%;
     line-height: 50px;
 }

 .segment{
     width: 350px;
     box-shadow: 0 2px 23px rgba(0,0,0,.3); 
     position: absolute;
     right: 16.6666666667%;
     top: 15%;
     padding-bottom: 30px;
     background: #fff;
 }

 .bg{
     background: rgb(46,155,255);
     height: 450px;
     position: relative;
     top: 70px;
 }
 .bg img{
     height: 350px;
     width: 394px;
     position: absolute;
     top: 50px;
     left: 20%;
 }

 .ui.header{
     margin: 0;
     background-color: rgb(27,158,243);
     height: 66px;
     line-height: 66px;
     color: #fff;
     font-size: 22px;
     font-weight: lighter;
     padding-left: 20px;
 }

 input.effect,input.effect:focus{
     outline: none;
     -webkit-appearance: none;
     border-radius: 0;
 }
 input.effect {
     border: 0;
     background: none;
     width: 100%;
     height: 40px;
     font-size: 20px;
     color: rgb(150,148,147);
     padding-top: 10px;
     font-size: 14px;
 }
 input::-webkit-input-placeholder {
     background-color: rgb(27,158,243);
 }

 .ui.form,.field{
     position: relative;
 }

 .ui.form,.msg{
     padding: 0 30px;
 }

 .msg{
     height: 40px;
     line-height: 60px;
     color: red;
 }

 .field{
     margin-top: 20px;
     /*border: 1px solid #000;*/
     height: 40px;
 }

 .effect{
     z-index: -1;
 }

 .effect ~ .focus-border {
     position: absolute;
     bottom: -3px;
     left: 0;
     width: 100%;
     height: 2px;
     background-color: rgb(150,148,147);
     transition: 0.4s;
     z-index: 1;
     -webkit-transform: translate3d(0, 0, 0);
     -moz-transform: translate3d(0, 0, 0);
     -ms-transform: translate3d(0, 0, 0);
     transform: translate3d(0, 0, 0);
 }
 .effect:focus ~ .focus-border,
 .has-content.effect ~ .focus-border {
     background-color: rgb(27,158,243);
     -webkit-transform: translate3d(0, 0, 0);
     -moz-transform: translate3d(0, 0, 0);
     -ms-transform: translate3d(0, 0, 0);
     transform: translate3d(0, 0, 0);
 }

 .effect ~ label{
     position: absolute;
     left: 0;
     width: 100%;
     top: 9px;
     color: rgb(150,148,147);
     transition: 0.3s;
     pointer-events: none;
     letter-spacing: 0.5px;
     font-size: 14px;
 }

 .effect:focus ~ label,.trans {
     color: rgb(27,158,243);
     transition: 0.3s;
     -webkit-transform: translate3d(0, -18px, 0);
     -moz-transform: translate3d(0, -18px, 0);
     -ms-transform: translate3d(0, -18px, 0);
     transform: translate3d(0, -18px, 0);
 }

 .cube {
     -webkit-transform: translate3d(0, 0, 0);
     -moz-transform: translate3d(0, 0, 0);
     -ms-transform: translate3d(0, 0, 0);
     transform: translate3d(0, 0, 0);
     -webkit-backface-visibility: hidden;
     -moz-backface-visibility: hidden;
     -ms-backface-visibility: hidden;
     backface-visibility: hidden;
     -webkit-perspective: 1000;
     -moz-perspective: 1000;
     -ms-perspective: 1000;
     perspective: 1000;
 }

 .login-button{
     background: rgb(27,158,243);
     text-align:center;
     margin-top:20px;
     color: #fff;
     float: right;
     height: 35px;
     width: 135px;
     line-height: 32px;
     border: none;
     cursor: pointer;
     box-shadow: 0 2px 5px rgba(0,0,0,.26); 
 }



</style>

