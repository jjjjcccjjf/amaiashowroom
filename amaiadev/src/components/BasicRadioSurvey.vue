<template>
    <div>
        <h4>{{ heading }}</h4>
        <ul class="radiob">
            <li v-for="(choice,index) in this.choices" :key="index">
                <input type="radio" :id="'buying'+index"  :value="choice"  v-model="survey[modulename][fieldname]" @change="updateVal"/>
                <label :for="'buying'+index">{{choice}}</label>
            </li>
          </ul>
    </div>
</template>

<script>
    import { mixin } from '../mixins/mixin.js'
    export default {
        mixins: [ mixin ],
        props: { 
            fieldname: String,
            modulename: String,
            heading:String,
            choices: {
                type: Array,
                default: function() {  return ['Highly Satisfied','Satisfied','Neutral','Dissatisfied','Highly Dissatisfied'] }
            },
            autoClick: {
                type:Boolean,
                default:true
            }
        },
        methods: {
            updateVal(e){
                let params = {
                    modulename: this.modulename,
                    fieldname: this.fieldname,
                    value: e.target.value
                }
                this.$store.commit('updateSyncData',params)
                if(this.autoClick == true){
                    this.$store.commit('questionUp')
                }
            }
        }
    }
</script>

<style scoped>

</style>