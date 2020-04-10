new Vue ({
    el: '#register-frm',
    data () {
        return {
            name: null,
            phone: null,
            password: null,
            cnf_password: null,
            accept: true,
            notice: {
                name: null,
                phone: null,
                password: null,
                cnf_password: null
            }
        }
    },
    mounted () {

    },
    methods: {
        async checkFormRegister () {
            try{
                let chknull = await this.checkNull()
                let chkphone = await this.checkPhone()
                let chkpass = await this.checkPassword()
                if(chknull && chkphone && chkpass) {
                    console.log('Pass?')
                }
            }catch(e){
                console.log(e)
            }
        },
        checkNull () {
            if(this.name != null && this.phone != null && this.password != null && this.cnf_password != null && this.accept == true){
                return true
            }else{
                if(this.name == null) {
                    this.notice.name = 'กรุณากรอกชื่อ - สกุล'
                }else{
                    this.notice.name = null
                }

                if(this.phone == null) {
                    this.notice.phone = 'กรุณากรอกหมายเลขโทรศัพท์'
                }else{
                    this.notice.phone = null
                }

                if(this.password == null) {
                    this.notice.password = 'กรุณากรอกรหัสผ่าน'
                }else{
                    this.notice.password = null
                }

                if(this.cnf_password == null) {
                    this.notice.cnf_password = 'กรุณากรอกรหัสผ่านอีกครั้ง เพื่อยืนยัน'
                }else{
                    this.notice.cnf_password = null
                }

                if(this.accept != true) {
                    this.notice.accept = 'กรุณากดยอมรับเงื่อนไข เพื่อดำเนินการต่อ'
                }else{
                    this.notice.accept = null
                }
            }
        },
        checkPhone () {
            if(this.phone != null) {
                if(this.phone.length == 10) {
                    if(this.checkPhoneDuplicate(this.phone) == false){
                        this.notice.phone = 'หมายเลขนี้ มีผู้ใช้งานไปแล้ว'
                    }else{
                        return true
                    }
                }else{
                    this.notice.phone = 'จำนวนหมายเลขโทรศัพท์ไม่ครบ กรุณาตรวจสอบ'
                }
            }
        },
        checkPassword () {
            if(this.password != null) {
                if(this.password.length >= 8) {
                    if(this.password != this.cnf_password) {
                        this.notice.cnf_password = 'รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบ'
                    }else{
                        return true
                    }
                }else{
                    this.notice.password = 'จำนวนของรหัสผ่านต้องมากกว่า 8 ตัว'
                }
            }
        },
        checkPhoneDuplicate (phone) {
            if(phone == '0000000000'){
                return false
            }else{
                return true
            }
        }
    }
})