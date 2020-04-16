export const login = {
    props:['_u_ss_isset'],
    methods: {
        logOut () {
            this.$store.dispatch('logout')
        }
    },
    computed: {
        
    },
    template: `<div>เข้าสู่ระบบแล้ว | <a href="" @click="logOut()">ออกจากระบบ</a></div>`
}