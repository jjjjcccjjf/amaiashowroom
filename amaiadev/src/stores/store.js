import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        getShowroomURL: 'http://showroom.amaialand.com/',
        currentQuestion: 1,
        currentModule: 1,
        totalQuestions: 0,
        minInArray: 0,
        maxInArray: 0,
        oldTotal:0,
        success: {},
        others: {},
        survey: {
            "buying_experience": {
                "be_knowledge": "",
                "be_courtesy": "",
                "be_response": "",
                "be_appearance": ""
            },
            "site_visit_experience": {
                "sve_appearance": "",
                "sve_attractiveness": "",
                "sve_orderliness": "",
                "sve_safety": "",
                "sve_accessibility": ""
            },
            "showroom_sales_office_model_unit": {
                "ssomu_cleanliness": "",
                "ssomu_safety": "",
                "ssomu_completeness": "",
                "ssomu_accessibility": "",
                "ssomu_comfort": ""
            },
            "product": {
                "p_design": "",
                "p_finishes": "",
                "p_sizes": "",
                "p_amenities": "",
                "p_pricing": "",
                "p_available": ""
            },
            "home_buying_decision": {
                "hbd_source": [],
                "hbd_budget": "",
                "hbd_primary_interest": "",
                "hbd_secondary_interest": ['',''],
                "hbd_primary_amenities": [],
                "hbd_secondary_amenities": [],
                "hbd_when": "",
                "hbd_if_not_purchasing": [],
                "hbd_how": [],
                "hbd_how_testimonial": "",
                "hbd_recommend": "",
                "hbd_recommend_testimonial": ""
            }
        },
        personal_information: {},
        meta: {}
    },
    getters: {
        getCurrentQuestion: state => state.currentQuestion,
        getCurrentModule: state => state.currentModule,
        getTotalQuestions: state => state.totalQuestions,
        getCurrentModuleName: state => state.survey[state.currentModule],
        getSurvey: state => state.survey,
        getFieldInSurvey: state => (modulename,fieldname) => state.survey[modulename][fieldname],
        getSurveyKeys: state => Object.keys(state.survey),
        getSurveyFields: state => Object.keys(state.survey).map(value => Object.keys(state.survey[value])),
        getOthers: state => state.others,
        getShowroomURL: state => state.getShowroomURL,
        getMinInArray: state => state.minInArray,
        getMaxInArray: state => state.maxInArray,
        getPersonalInfo: state => state.personal_information,
        getMeta: state => state.meta,
        getSuccess: state => state.success
    },
    mutations: {
        questionUp(state){
            if(state.survey[this.getters.getSurveyKeys[state.currentModule-1]][this.getters.getSurveyFields[state.currentModule-1][state.currentQuestion-1]] == '')
            {
                alert('You must answer to proceed')
                return
            }
            // if(state.currentModule == 6){
            //     // Final SUb
            //     if(state.currentModule == this.getters.getSurveyKeys.length){
            //         let newSurvey = {}
            //         for(let key of this.getters.getSurveyKeys){
            //             newSurvey[key] = {}
            //             for(let field of Object.keys(state.survey[key])){
            //                 let x = state.survey[key][field]
            //                 if(Array.isArray(x)){
            //                     let newArr = x.map( v => {
            //                         if(v == 'Others'){
            //                             return `Others-${state.others[field]}`
            //                         }
            //                         return v
            //                     })
            //                     newArr = newArr.join('|')
            //                     newSurvey[key][field] = []
            //                     newSurvey[key][field] = newArr
            //                 }else{
            //                     newSurvey[key][field] = x
            //                 }
            //             }
            //         }
                    
            //     }
                
            //     return
            // }
            if(state.currentQuestion % state.totalQuestions == 0){
                state.currentQuestion = 1
                state.currentModule++
                return
            }
            if(state.minInArray != 0){
                
                if(state.survey[this.getters.getSurveyKeys[state.currentModule-1]][this.getters.getSurveyFields[state.currentModule-1][state.currentQuestion-1]].length < state.minInArray){
                    alert(`You must choose up to ${state.minInArray}!`)
                    return
                }else if(typeof state.survey[this.getters.getSurveyKeys[state.currentModule-1]][this.getters.getSurveyFields[state.currentModule-1][state.currentQuestion-1]] == "object" && state.survey[this.getters.getSurveyKeys[state.currentModule-1]][this.getters.getSurveyFields[state.currentModule-1][state.currentQuestion-1]].filter(val => val != '').length < state.minInArray){
                    alert(`You must choose up to ${state.minInArray}!`)
                    return
                }
                else{
                    state.minInArray = 0
                }
            }
            state.currentQuestion++
        },
        questionDown: state => {
            
            if(state.currentQuestion == 1 && state.currentModule != 1){
                state.currentModule--
                state.currentQuestion = state.oldTotal
                return
            }else if(state.currentQuestion == 1 && state.currentModule == 1){
                return
            }
            else{
                state.currentQuestion--
            }
        },
        setTotalQuestions: (state, num) => {
            state.totalQuestions = num
        },
        updateSyncData: (state, { modulename,fieldname,value }) => {
            state.survey[modulename][fieldname] = value
        },
        updateSyncDataArray: (state, { modulename,fieldname,value }) => {
            state.survey[modulename][fieldname].push(value)
        },
        updateSyncDataPos: (state, { modulename, fieldname, position,value }) => {
            state.survey[modulename][fieldname][position] = value
        },
        moduleDown: state => state.currentModule--,
        setOldTotal: (state, num) => {
            state.oldTotal = num
        },
        addOthers: (state, { key, val}) => {
            state.others[key] = val
        },
        setMinInArray: (state, min) => {
            state.minInArray = min
        },
        setMaxInArray: (state, min) => {
            state.maxInArray = min
        },
        setPersonalInfo: (state, personalinfo) => {
            state.personal_information = personalinfo
        },
        setMeta: (state,meta) => {
            state.meta = meta
        },
        setSuccess: (state, success) => {
            state.success = success
        }
    },
    actions: {
        submitSurvey: ({ commit, state }) => {
            if(state.currentModule == Object.keys(state.survey).length+1){
                let newSurvey = {}
                let currentSurvey = state.survey
                for(let key of Object.keys(state.survey)){
                    newSurvey[key] = {}
                    for(let field of Object.keys(state.survey[key])){
                        let x = state.survey[key][field]
                        if(Array.isArray(x)){
                            let newArr = x.map( v => {
                                if(v == 'Others'){
                                    return `Others-${state.others[field]}`
                                }
                                return v
                            })
                            newArr = newArr.join('|')
                            newSurvey[key][field] = []
                            newSurvey[key][field] = newArr
                        }else{
                            newSurvey[key][field] = x
                        }
                    }
                }

                // process results here
                let res = {}
                res.survey = newSurvey
                res.meta = state.meta
                res.personal_information = state.personal_information
                axios({
                    method: 'POST',
                    url: `${state.getShowroomURL}api/sync/`,
                    headers: {
                    "Content-Type": "application/json"
                    },
                    auth: {
                        username: 'admin',
                        password: '8NSaK!9=M}a({-18Nq9${vY-{#Z<WH7KDKhr(I*^yss|z{!<L[/"BNI@U(5?@#h'
                    },
                    data: res
                })
                .then(response => {
                    state.currentModule = 999
                });
                
                // window.location.href="pang"
            }
            
            return
        }
    }
});