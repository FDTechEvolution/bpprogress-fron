export const th_validation = VeeValidate.Validator.localize('th', {
    custom: {
      fullname: {
        required: 'กรุณากรอกชื่อ - สกุล'
      },
      phone: {
          required: 'กรุณากรอกหมายเลขโทรศัพท์',
          numeric: 'ใส่เฉพาะตัวเลขเท่านั้น',
          min: 'หมายเลขโทรศัพท์ 10 หลัก',
          max: 'เกิน 10 หลัก'
      },
      password: {
          required: 'กรุณากรอกรหัสผ่าน',
          min: 'ต้องมีมากกว่า 8 ตัวขึ้นไป'
      },
      confirmPassword: {
          is: 'รหัสผ่านไม่ตรงกัน'
      }
    }
  })