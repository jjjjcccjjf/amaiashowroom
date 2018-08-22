<template>
        <aside class="prevnext" v-if="this.currentModule !== 999">
          <input type="button" name="back" value="Back" class="back" @click="prev" v-if="!(this.currentModule == 1 && this.currentQuestion == 1)">
          <input type="button" name="next" value="Next" class="next" @click="next" v-if="!(this.currentModule == 6 && this.currentQuestion == 1)">
        </aside>
</template>

<script>
    import { mixin } from '../mixins/mixin.js'
    export default {
        mixins: [ mixin ],
        methods: {
            prev(){
                this.$store.commit('questionDown')
            },
            next(){
                this.$store.commit('questionUp')
                
            }
        }
    }
</script>

<style scoped>

</style>