<template>
    <div>
        <h4>{{ heading }}</h4>
          <p>
            <textarea @input="updateVal" v-model.trim="message"></textarea>
          </p>
    </div>
</template>

<script>
import { mixin } from '../../mixins/mixin.js'

    export default {
        mixins: [ mixin ],
        mounted(){
            this.message = this.survey[this.modulename][this.fieldname]
        },
        props: { 
            heading: String,
            modulename: String,
            fieldname: String,      
        },
        data(){
            return {
                message: ''
            }
        },
        methods: {
            updateVal(){
                let params = {
                    modulename: this.modulename,
                    fieldname: this.fieldname,
                    value: this.message                   
                }
                this.$store.commit('updateSyncData', params)
            }
        }
    }
</script>

<style scoped>

</style>