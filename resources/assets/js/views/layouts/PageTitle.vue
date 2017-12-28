<template>
    <div>
        <el-breadcrumb separator=" > ">
            <el-breadcrumb-item :to="{path: '/'}">xxx系统</el-breadcrumb-item>
            <el-breadcrumb-item v-for="(item, index) in breads" :to="{ path: item.path }" :key="item.key">{{item.label}}</el-breadcrumb-item>
        </el-breadcrumb>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    name: 'page-title',
    props: {
        breads: {
            type: Array,
            required: true
        },
    },

    methods: {
        handleClick(tab) {
            this.menubar.forEach(item => {
                if(item.label === tab.name) {
                    this.$router.push(item.router)
                }
            })
        }
    }
}
</script>
