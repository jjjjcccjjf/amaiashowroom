<template>
    <div @click="handleClick">
        {{ newText != '' ? newText : text }}
    </div>
</template>

<script>
    import { module_mixin } from '../../mixins/module_mixin.js'
    require('../../custom-select.js')


    export default {
        mounted(){
            if(this.formatText){
                this.newText = (this.text.split('_')).map( val => {
                    return val.charAt(0).toUpperCase() + val.slice(1)
                }).join(' ')
            }
        },
        methods: {
            handleClick(){
                this.$emit('handleClick',
                { 
                    val: this.val, 
                    text: this.formatText == true? this.newText : this.text
                }
                )
            }
        },
        data() {
            return {
                newText : ""
            }
        },
        props: ['item','text','val','formatText'],
        mixins: [ module_mixin ]
    }
    
</script>

<style scoped>

</style>