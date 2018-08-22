<template>
    <section class="breadcrumbs" >
        <div class="pagewrapper2">
          <aside>
            <ul>
              <li :class="nav[0]">
                <h6>Buying <br>Experience</h6>
                <span class="on"></span>
              </li>
              <li :class="nav[1]">
                <h6>Site Visit <br>Experience</h6>
                <span></span>
              </li>
              <li :class="nav[2]">
                <h6>Showroom/Sales <br>Office/Model Unit</h6>
                <span></span>
              </li>
              <li :class="nav[3]">
                <h6>Product</h6>
                <span></span>
              </li>
              <li :class="nav[4]">
                <h6>Home-Buying <br>Decisions</h6>
                <span></span>
              </li>
            </ul>
            <div class="line"></div>
            <div class="line1 per0"></div>
          </aside>
        </div>
    </section>
</template>

<script>
    import { mixin } from '../mixins/mixin.js'
    export default {
        mounted(){
            this.$store.commit('setTotalQuestions',this.moduleQuestionsTotal[0])
        },
        data(){
            return {
                nav: [
                    "active current",
                    "",
                    "",
                    "",
                    ""
                ],
                moduleQuestionsTotal: [
                    4,
                    5,
                    5,
                    6,
                    9,
                ]
            }
        },
        mixins: [ mixin ],
        watch: {
            currentModule: function(newV,oldV){
                let oldIndex = oldV - 1
                let index = newV - 1
                let newNav = this.nav
                this.$store.commit('setTotalQuestions',this.moduleQuestionsTotal[index])
                if(newV > oldV){
                    this.$store.commit('setOldTotal',this.moduleQuestionsTotal[oldIndex])
                }else{
                    this.$store.commit('setOldTotal',this.moduleQuestionsTotal[oldIndex-2])
                }
                if(oldV > newV){
                    newNav.splice(oldIndex,1,'')
                }
                newNav.splice(index,1,'active current')
                this.nav = newNav
            }
        }
    }
</script>

<style scoped>

</style>