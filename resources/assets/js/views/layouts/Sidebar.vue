<template>
    <section class="app-sidebar">
        <div class="app-head">
            <img src="/image/logo.png"/>
        </div>
        <div class="app-menu">
            <el-menu :default-active='expand' :unique-opened="true" theme="dark" router="router">
                <template v-for="(item, index) in menu[0]" v-if="item.route.meta.menu_type == 'sideBar' || item.route.meta.menu_type == 'noChildren'">
                    <template  v-if="item.route.meta.menu_type == 'noChildren'">
                        <el-menu-item :index="item.route.path"><i :class="item.route.meta.icon"></i>{{ item.label }} </el-menu-item>
                    </template>
                    <el-submenu :index="item.route.path" v-else>
                        <template slot="title"><i :class="item.route.meta.icon"></i>{{ item.label }}</template>
                        <el-menu-item-group>
                            <el-menu-item v-for="(c, i) in item.children" v-if="c.route.meta.menu_type == 'sideBar'" :key="item.path + '/' +c.path"  :index="item.route.path + '/' + c.route.path">{{ c.label }} </el-menu-item>
                        </el-menu-item-group>
                    </el-submenu>
                </template>
            </el-menu>
        </div>
    </section>
</template>

<script>

import { mapGetters } from 'vuex'

export default {
    data () {
        return {
        expand: ''
        }
    },

    computed: mapGetters({
        menu: 'menusitems'
    }),

    mounted() {
        let route = this.$route;
        if (route.name) {
            this.shouldExpandMatchItem(route);
        }
    },

    methods: {
             shouldExpandMatchItem(route) {
                 let matched = route.matched;
                 let lastMatched = matched[matched.length - 1];
                 this.expand = lastMatched.path;
             }
    },

    watch: {
           $route (route) {
               this.shouldExpandMatchItem(route);
           }
    }
}

//$(.el-menu-item-group__title).css('padding-top','0px')

</script>

<style lang="stylus">
.app-menu
    .el-menu-item-group__title
        padding-top:0px;
.app-sidebar
  position: fixed;
  top: 0;
  bottom: 0;
  padding: 0 0 50px;
  width: 165px;
  min-width: 45px;
  height: calc(100% - 50px);
  z-index: 1024;
  background: #2e2e2e;
  //box-shadow: 0 2px 3px rgba(17, 17, 17, 0.1), 0 0 0 1px rgba(17, 17, 17, 0.1);
  overflow-y: auto;
  overflow-x: hidden;

</style>
