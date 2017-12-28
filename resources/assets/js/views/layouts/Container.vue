<template>
    <section class="main">
        <page-title v-if="pageTitle.show_breadcrumbs"
            :breads="pageTitle.breadcrumbs ? pageTitle.breadcrumbs : []"
        >
        </page-title>
        <div class="container">
            <router-view style="height:100%;"></router-view>
        </div>
    </section>
</template>
<script>
import { mapGetters } from 'vuex'
import PageTitle from './PageTitle'
export default {
    computed: {
        ...mapGetters([
            'pageTitle'
        ])
    },
    components: {
        PageTitle
    },
}
</script>
<style>
 .main {
     top: 55px;
     left: 166px;
     width: calc(100% - 196px);
     height: calc(100% - 55px);
     position: absolute;
     background-color: #f9f9f9;
     padding: 15px 15px;
 }
 .container {
     height: 100%;
 }
</style>
