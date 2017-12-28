<template>
    <div id="app">
        <div class="core">
            <navbar></navbar>
            <sidebar></sidebar>
            <container></container>
        </div>
    </div>
</template>
<script>
 import { Navbar, Container, Sidebar } from './layouts/'
 export default {
     name: 'Home',
     data () {
         return {
         };
     },
     components: {
         Navbar,
         Sidebar,
         Container,
     },
     computed: {
     },
     methods: {
     },
     mounted(){
     },
 }
</script>


<style>
 body,html{
   font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;position:relative;
   min-height:100%;
   font-size: 14px;
   background: #f9f9f9;
 }
</style>
