export const login = {
    props:['url'],
    data () {
        return {
            url: 'dfsdfsfsdfsdf'
        }
    },
    methods: {
        logOut () {
            this.$store.dispatch('logout')
        },
        logIn () {
            window.location.replace(window.location + '/login')
        }
    },
    computed: {
        chkLogin () {
            // console.log(localStorage.getItem('_u_ss_isset'))
            if(this.$store.getters.userLogin == true) {
                localStorage.setItem('_u_ss_ison_t', true)
            }
            // console.log(localStorage.getItem('_u_ss_isset'))
            // console.log(localStorage.getItem('_u_ss_ison_t'))
        }
    },
    template: `<li>{{chkLogin}}
                    <span v-if="localStorage.getItem('_u_ss_ison_t')"><a href="" @click="logOut()"> ออกจากระบบ</a></span>
                    <span v-else><a href="http://localhost/git/bpprogress-fron/login">เข้าสู่ระบบ</span>
                </li>`
}