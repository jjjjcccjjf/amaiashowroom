<template>
    <div>
    <li v-if="text !== 'Others'">
        <input 
        type="checkbox" 
        :id="text" 
        :name="name"
        :value="text"
        v-model="survey[modulename][fieldname]" 
        @change="updateVal"
        />
        <label :for="id">{{ text }}</label>
    </li>
    <li v-else>
        <input 
        type="checkbox" 
        :id="text" 
        :name="name"
        :value="text"
        v-model="survey[modulename][fieldname]" 
        @change="updateVal"
        @click="toggleText = !(toggleText)"
        />
        <label :for="id">Others</label>
        <p v-if="this.storeOthers[this.fieldname] != undefined || toggleText"><input @input="updateOthers" :value="this.storeOthers[this.fieldname]" type="text" class="Kindly specify" ></p>
    </li>
    </div>
</template>

<script>
import { mixin } from '../../mixins/mixin.js'    
export default {
    props: [ 'id', 'name','text','fieldname','modulename','withOthers'],
    mixins: [ mixin ],
    methods: {
        updateVal(){
            let params = {
                modulename: this.surveyKeys[this.currentModule-1],
                fieldname: this.surveyFields[this.currentModule-1][this.currentQuestion-1],
                value: this.survey[this.modulename][this.fieldname]
            }
            this.$store.commit('updateSyncData',params)
        },
        updateArray(){
            this.toggleText = !(this.toggleText)
            if(this.toggleText){
                this.survey[this.modulename][this.fieldname].push('Others - '+this.otherValue)
                let params = {
                    modulename: this.surveyKeys[this.currentModule-1],
                    fieldname: this.surveyFields[this.currentModule-1][this.currentQuestion-1],
                    value: this.survey[this.modulename][this.fieldname]
                }
                this.$store.commit('updateSyncData',params)
            }else{
                let params = {
                    modulename: this.surveyKeys[this.currentModule-1],
                    fieldname: this.surveyFields[this.currentModule-1][this.currentQuestion-1],
                    value: this.survey[this.modulename][this.fieldname].filter(val => val.slice(0,6) !== 'Others')
                }
                this.$store.commit('updateSyncData',params)
            }
            
        },
        updateOthers(e){
            let params = {
                key: this.fieldname,
                val: e.target.value
            }
            this.$store.commit('addOthers',params)
        }
    },
    data(){
        return {
            toggleText: false,
            otherValue: ''
        }
    }

}
</script>

<style scoped>

</style>