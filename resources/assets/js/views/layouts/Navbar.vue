<template>
  <section class="app-navbar">
      <el-row>
        <el-col :offset=19 :span="5" class="nav-right">
            <el-dropdown @command="handleUserCommand">
              <span class="el-dropdown-link">
                用户名<i class="el-icon-caret-bottom el-icon--right"></i>
              </span>
              <el-dropdown-menu slot="dropdown">
                <el-dropdown-item command="jumpToProfile">个人信息</el-dropdown-item>
                <el-dropdown-item command="signout">退出登录</el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>
        </el-col>
      </el-row>
  </section>

</template>

<script>

 export default {
   data () {
     return {
     }
   },

   mounted() {
   },

   watch: {
   },

   methods: {
        handleUserCommand: function(c){
           switch(c) {
               case 'jumpToProfile':
                   //this.$router.push('/profile');
                   break;
               case 'signout':
                   this.$http.post('/api/signout').then((res) => {
                       sessionStorage.clear();
                       this.$message.success("退出成功");
                       this.$router.push("/signin");
                   });
                   break;
           }
        },



   }
 }
</script>

<style>
.app-navbar {
    top: 0;
    left: 166px;
    width: calc(100% - 166px);
    position: fixed;
    z-index: 1023;
    box-shadow: 0 2px 3px rgba(17, 17, 17, 0.1), 0 0 0 1px rgba(17, 17, 17, 0.1);
    background-color: #fff;
    height: 55px;
    line-height: 55px;
}
.nav-right {
    text-align: right;
}


</style>
