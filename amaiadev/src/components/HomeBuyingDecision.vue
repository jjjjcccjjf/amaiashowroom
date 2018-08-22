<template>
    <div>
        <!-- Question 1 -->
        <BasicCheckbox :max="2" heading="How did you learn about Amaia (Choose up to two)" :items="source" modulename="home_buying_decision" fieldname="hbd_source" :withOthers="true" v-if="currentModule == 5 && currentQuestion == 1"/>
        
        <!-- Question 2 -->
        <BasicDropdown defaultoption="choose budget" :items="budgets" heading="How much is your budget to invest for a property?" modulename="home_buying_decision" fieldname="hbd_budget" v-if="currentModule == 5 && currentQuestion == 2" />
        
        <!-- Question 3 -->
        <ConditionalDropdown defaultoption="Choose Project Category" :format="true" :count="2" heading="What project are you most interested in? Primary interest" defaultoption2="Choose Project" :items="projects" modulename="home_buying_decision" fieldname="hbd_primary_interest" v-if="currentModule == 5 && currentQuestion == 3" />

        <!-- Question 4 -->
        <GroupConditionalDropdown :pos="0" defaultoption="Choose Project Category" :format="true" :count="2" heading="What project are you interested in, if any? Secondary interest (Choose up to two)" defaultoption2="Choose Project" :items="projects" modulename="home_buying_decision" fieldname="hbd_secondary_interest" v-if="currentModule == 5 && currentQuestion == 4" />
        <GroupConditionalDropdown :pos="1" defaultoption="Choose Project Category" :format="true" :count="2" heading="" defaultoption2="Choose Project" :items="projects" modulename="home_buying_decision" fieldname="hbd_secondary_interest" v-if="currentModule == 5 && currentQuestion == 4" />

        <!-- Question 5 -->
        <BasicCheckbox :key="0" :max="2" :min="1" heading="What amenities do you consider as top priority (Choose one or two only)" :items="amenities" modulename="home_buying_decision" fieldname="hbd_primary_amenities" :withOthers="true" v-if="currentModule == 5 && currentQuestion == 5"/>

        <!-- Question 6 -->
        <BasicCheckbox :key="1" :max="3" :min="1" heading="What amenities do you consider as secondary (Choose max of three only)" :items="amenities" modulename="home_buying_decision" fieldname="hbd_secondary_amenities" :withOthers="true" v-if="currentModule == 5 && currentQuestion == 6"/>

        <!-- Question 7 -->
        <BasicDropdown defaultoption="Choose one" :items="when" heading="When do you intend to reserve?" modulename="home_buying_decision" fieldname="hbd_when" v-if="currentModule == 5 && currentQuestion == 7" />

        <!-- question 8 -->
        <BasicCheckbox :max="3" :min="1" heading="If you do not intend to purchase, what were the reasons for such? (Choose maximum of three)" :items="reasons" modulename="home_buying_decision" fieldname="hbd_if_not_purchasing" :withOthers="true" v-if="currentModule == 5 && currentQuestion == 8"/>

        <!-- questions 9 -->
         <BasicRadioSurvey
         :autoClick="false" 
         heading="How likely is it that you would recommend this real estate company to others?" 
         modulename="home_buying_decision" 
         fieldname="hbd_how" 
         v-if="currentModule == 5 && currentQuestion == 9"
         :choices="['Extremely Likely','Likely','Neutral','Unlikely','Extremely Unlikely']"
          />

        <BasicTextbox 
        heading="Please leave a brief testimonial/feedback (optional)"
        modulename="home_buying_decision"
        fieldname="hbd_how_testimonial"
        v-if="currentModule == 5 && currentQuestion == 9"
        />



        
    </div>
</template>

<script>
//mixins
import { mixin } from '../mixins/mixin.js'
import { module_mixin } from '../mixins/module_mixin.js'

//components
import BasicCheckbox from './homebuyingdecisions/BasicCheckbox.vue'
import BasicDropdown from './homebuyingdecisions/BasicDropdown.vue'
import ConditionalDropdown from './homebuyingdecisions/ConditionalDropdown.vue'
import GroupConditionalDropdown from './homebuyingdecisions/GroupConditionalDropdown.vue'
import BasicRadioSurvey from './BasicRadioSurvey.vue'
import BasicTextbox from './homebuyingdecisions/BasicTextbox.vue'

//JS libraries
import axios from 'axios'
// import BasicRadioSurvey from './BasicRadioSurvey.vue'

export default {
    created(){
        
        axios({
            method: 'GET',
            url: `${this.showroomURL}api/options/`,
            headers: {
            "Content-Type": "application/json"
            },
            auth: {
                username: 'admin',
                password: '8NSaK!9=M}a({-18Nq9${vY-{#Z<WH7KDKhr(I*^yss|z{!<L[/"BNI@U(5?@#h'
            },
        })
        .then(response => {

            this.options = response.data
            this.source = response.data.other_information.source
            this.budgets = response.data.other_information.budget
            this.projects = response.data.other_information.projects
            this.amenities = response.data.other_information.amenities
            this.when = response.data.survey.when_reserve
            this.reasons = response.data.survey.reasons_for_not_purchase
        });
    },
    data(){
        return {
            options: {},
            source: {},
            budgets: {},
            t: false
        }
    },
    components: { BasicTextbox,BasicRadioSurvey,BasicCheckbox , BasicDropdown, ConditionalDropdown, GroupConditionalDropdown},
    mixins: [ mixin, module_mixin ]
}
</script>

<style scoped>

</style>