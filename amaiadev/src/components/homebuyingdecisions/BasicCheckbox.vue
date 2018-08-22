<template>
    <div>
        <h4>{{ heading }}</h4>
            <ul class="checkbox">
                <CheckboxItem :max="max != undefined ? max : 1" :withOthers="withOthers" v-for="(item,index) in items" :key="index" :name="item" :id="item + '' + index" :text="item" :modulename="modulename" :fieldname="fieldname" />
            </ul>
    </div>
</template>

<script>

import CheckboxItem from './CheckboxItem.vue'
import { mixin } from '../../mixins/mixin.js'
export default {
    mixins: [ mixin ],
    mounted(){
        if(this.min != undefined){
            this.$store.commit('setMinInArray',this.min)
        }
        if(this.max != undefined){
            this.$store.commit('setMaxInArray',this.max)
        }

        
    },
    props: [ 'heading', 'items', 'withOthers','modulename','fieldname','min','max'],
    components: { CheckboxItem }
    
}
</script>

<style scoped>

</style>