<template>
    <li v-if="text !== 'Others'">
        <input 
        type="checkbox" 
        :id="text" 
        :name="name"
        :value="text"
        v-model="survey[modulename][fieldname]" 
        @change="updateVal"
        @click="handleClick"
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
        @click="handeClickOthers"
        />
        <label :for="id">Others</label>
        <p v-if="this.toggleText"><input @input="updateOthers" :value="this.storeOthers[this.fieldname]" type="text" class="Kindly specify" ></p>
    </li>
</template>

<script>
import { mixin } from '../../mixins/mixin.js'    
export default {
    mounted(){
        // alert(this.storeOthers[this.fieldname].includes('Others'))
        if(this.text == 'Others'){
            if( (this.storeOthers[this.fieldname] != undefined || this.storeOthers[this.fieldname] != '') ){
                if(this.survey[this.modulename][this.fieldname].includes('Others')){
                    this.toggleText = true;
                }
            }
        }
    },
    props: [ 'max','id', 'name','text','fieldname','modulename','withOthers'],
    mixins: [ mixin ],
    methods: {
        handeClickOthers(e){
            if(this.survey[this.modulename][this.fieldname].includes(e.target.value)){
                this.toggleText = !(this.toggleText)
                return true
            }
            
            let itemcount = this.survey[this.modulename][this.fieldname].length
            if(itemcount >= this.max){
                e.preventDefault()
                alert(`Sorry, you can only choose ${this.max}`)
                return false
            }else{
                this.toggleText = !(this.toggleText)
            }
            
        },
        handleClick(e){
            if(this.survey[this.modulename][this.fieldname].includes(e.target.value)){
                return true
            }


            let itemcount = this.survey[this.modulename][this.fieldname].length
            if(itemcount >= this.max){
                e.preventDefault()
                alert(`Sorry, you can only choose ${this.max}`)
                return false
            }
        },
        updateVal(){
            
            let params = {
                modulename: this.modulename,
                fieldname: this.fieldname,
                value: this.survey[this.modulename][this.fieldname]
            }
            this.$store.commit('updateSyncData',params)
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