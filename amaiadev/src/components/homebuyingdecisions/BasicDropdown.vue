<template>
    <div>
        <h4>{{ heading }}</h4>
        <div @click="handleClick" :class="{'select-selected':true,'select-arrow-active':!toggleCheckbox}">{{ selected != '' ? selected : defaultoption}}</div>
        <div :class="{'select-items':true, 'select-hide':this.toggleCheckbox}">
            <DropDownitem :format="false" v-for="(item,index) in this.items" :key="index" :val="item" :text="item" @handleClick="handleClickChild"/>
        </div>
        <div>
        <p v-if="selected == 'Others'"><input @input="updateOthers" :value="this.storeOthers[this.fieldname]" type="text" placeholder="Kindly specify" ></p>
        </div>
    </div>
</template>

<script>

import CheckboxItem from './CheckboxItem.vue'
import { mixin } from '../../mixins/mixin.js'    
import DropDownitem from './DropDownitem.vue'




export default {
    mixins: [ mixin ],
    mounted(){
        if(this.survey[this.modulename][this.fieldname] != '' || this.survey[this.modulename][this.fieldname] != undefined)
        {
            this.selected = this.survey[this.modulename][this.fieldname]
        }
    },
    data(){
        return {
            toggleCheckbox: true,
            selected: this.defaultoption
        }
    },
    methods: {
        handleClick: function() {
            this.toggleCheckbox = !(this.toggleCheckbox)
        },
        handleClickChild: function(val){
            this.selected = val.text
            let params = {
                modulename: this.modulename,
                fieldname: this.fieldname,
                value: val.val
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
    props: [ 'heading', 'withOthers','modulename','fieldname', 'items','defaultoption'],
    components: { CheckboxItem , DropDownitem}
    
}



</script>

<style scoped>

</style>