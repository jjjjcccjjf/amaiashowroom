<template>
        <div>
            <h4>{{ heading }}</h4>
            <div class="custom-select">
            <div @click="handleClick" :class="{'select-selected':true, 'select-arrow-active': !toggleCheckbox}">{{ selected != '' ? selected : defaultoption}}</div>
            <div :class="{'select-items':true, 'select-hide':this.toggleCheckbox}">
                <DropDownitem v-for="(item,index) in keys" :key="index" :formatText="format" :val="item" :text="item" @handleClick="handleClickChildConditional"/>
            </div>
            </div>
            <div v-if="this.selected != this.defaultoption">
                <div class="custom-select">
                    <div @click="toggleCheckbox2 = !(toggleCheckbox2)" :class="{'select-selected':true, 'select-arrow-active': !toggleCheckbox2}">{{ selected2 != '' ? selected2 : defaultoption2}}</div>
                    <div :class="{'select-items':true, 'select-hide':this.toggleCheckbox2}">
                        <DropDownitem v-for="(item,index) in this.resultOptions" :key="index" :val="item" :text="item" @handleClick="handleClickProject"/>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>

import CheckboxItem from './CheckboxItem.vue'
import { mixin } from '../../mixins/mixin.js'   
import { module_mixin } from '../../mixins/module_mixin.js'  
import DropDownitem from './DropDownitem.vue'




export default {
    mixins: [ mixin ],
    mounted(){
        this.selected = this.defaultoption
        if(this.survey[this.modulename][this.fieldname] != '')
        {
            let formattedSelect = ''
            let valSelect = ''
            for(let key in this.items){

                if(this.items[key].includes(this.survey[this.modulename][this.fieldname])){
                    valSelect = key
                    formattedSelect = (key.split('_')).map( val => {
                    return val.charAt(0).toUpperCase() + val.slice(1)
                }).join(' ')
                }
            }
            this.selected = formattedSelect
            this.valKey = valSelect
            this.formattedSelect = formattedSelect
            this.selected2 = this.survey[this.modulename][this.fieldname]
            this.resultOptions = this.items[valSelect]
        }
    },
    data(){
        return {
            toggleCheckbox: true,
            toggleCheckbox2: true,
            selected: this.defaultoption,
            selected2: this.defaultoption2,
            keys : Object.keys(this.items),
            resultOptions: [],
        }
    },
    methods: {
        handleClick: function() {
            this.toggleCheckbox = !(this.toggleCheckbox)
        },
        handleClickChild: function(val){
            this.selected = val
            let params = {
                modulename: this.modulename,
                fieldname: this.fieldname,
                value: val
            }
            this.$store.commit('updateSyncData',params)
        },
        handleClickChildConditional: function(val){
            this.selected = val.text
            this.resultOptions = this.items[val.val]
            // let params = {
            //     modulename: this.modulename,
            //     fieldname: this.fieldname,
            //     value: val.val
            // }
            // this.$store.commit('updateSyncData',params)
        },
        handleClickProject: function(val){
            this.selected2 = val.val
            // this.resultOptions = this.items[val.val]
            let params = {
                modulename: this.modulename,
                fieldname: this.fieldname,
                value: val.val
            }
            this.$store.commit('updateSyncData',params)
        }
        
    },
    props: [ 'heading', 'withOthers','modulename','fieldname', 'items','defaultoption','format','defaultoption2'],
    components: { CheckboxItem , DropDownitem},
    watch: {
        selected: function(newV,oldV)
        {
            if(this.survey[this.modulename][this.fieldname] != '' && !this.resultOptions.includes(this.selected2)){
                this.selected2 = this.defaultoption2
                let params = {
                    modulename: this.modulename,
                    fieldname: this.fieldname,
                    value: ''
                }
                this.$store.commit('updateSyncData',params)
            }
        }
    }
    
}



</script>

<style scoped>
.custom-select{
    margin-bottom:10px
}
</style>