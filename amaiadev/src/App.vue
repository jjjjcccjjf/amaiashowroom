<template>
  <div id="app">
    
    <div id="mainapp" v-if="valid">
      <Header />
      <Breadcrumbs />
      <section class="questionnaire">
        <div class="pagewrapper2">
            <QuestionCount />
        <BuyingExperience />
        <SiteVisitExperience />
        <ShowroomSales />
        <Product />
        <HomeBuyingDecision />
        <Agreement />
        <PrevNext/>
        </div>
      </section>
    </div>
    <div v-else>
            <h1>404</h1>
            <p>page not found</p>
    </div>
  </div>
</template>

<script>

import Header from './components/Header.vue'
import Breadcrumbs from './components/Breadcrumbs.vue'
import PrevNext from './components/PrevNext.vue'
import QuestionCount from './components/QuestionCount.vue'

//Questions
import BuyingExperience from './components/BuyingExperience.vue'
import SiteVisitExperience from './components/SiteVisitExperience.vue'
import ShowroomSales from './components/ShowroomSales.vue'
import Product from './components/Product.vue'
import HomeBuyingDecision from './components/HomeBuyingDecision.vue'
import Agreement from './components/Agreement.vue'
//

// import axios  from 'axios';
import { mixin } from './mixins/mixin.js'
import axios from 'axios';


//Routes

export default {
  mounted(){
  let params = window.location.search
                .substring(1)
                .split("&")
                .map(v => v.split("="))
                .reduce((map, [key, value]) => map.set(key, decodeURIComponent(value)), new Map())
  let token = params.get('token')
  // check api
  axios({
            method: 'GET',
            url: `http://showroom.amaialand.com/api/token/check/?t=${token}`,
            headers: {
            "Content-Type": "application/json"
            },
            auth: {
                username: 'admin',
                password: '8NSaK!9=M}a({-18Nq9${vY-{#Z<WH7KDKhr(I*^yss|z{!<L[/"BNI@U(5?@#h'
            },
  }).then(response => {

    if(Object.keys(response.data.personal_information.personal_information).length > 0){
      this.$store.commit('setPersonalInfo',response.data.personal_information)
      this.$store.commit('setMeta',response.data.meta)
      this.valid = true
    }
  })


  //get success page contents
  axios({
            method: 'GET',
            url: `http://showroom.amaialand.com/api/thankyou`,
            headers: {
            "Content-Type": "application/json"
            },
            auth: {
                username: 'admin',
                password: '8NSaK!9=M}a({-18Nq9${vY-{#Z<WH7KDKhr(I*^yss|z{!<L[/"BNI@U(5?@#h'
            },
  }).then(response => {
    this.$store.commit('setSuccess',response.data);
  })

  },
  data(){
    return {
      valid: false
    }
  },
  name: 'app',
  mixins: [ mixin ],
  components: {
    QuestionCount,
    Header,
    Breadcrumbs,
    PrevNext,
    BuyingExperience,
    SiteVisitExperience,
    ShowroomSales,
    Product,
    HomeBuyingDecision,
    Agreement
  }
}
</script>

<style scoped>
h1,p{
  text-align: center;
}
h1{
  margin-top: 200px !important;
}
</style>
