class Vali{

    #count=0
    #countGlobal=[]
    #result=true
    #validators=""

    #error=false
    #errorMessage=""
    #voidMessage(msg){
        if(msg==null || msg.trim()==""){
            return true
        }else{
            return false
        }
    }

    /* */
    #required(value){
        if(value.trim()!=""){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #isString(value){
        if(typeof value == "string"){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
        
    }
    #selectRadio(value){
        
        const radio=(array)=>{
            var arrayLen

            if(isNaN(array)){
                arrayLen=array.length
            }else{
                arrayLen=array
            }

            for(var i=0;i<arrayLen;i++){
                if(array[i].checked){
                    return true
                }
            }
            return false
        }

        if(radio(value)){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #selectCheckBox(value,limit=null,len=null){
        //console.log(limit)
        //console.log(len)
        //console.log(value)

        const check=(array)=>{
            var arrayLen
            var count=0

            if(isNaN(array)){
                arrayLen=array.length
            }else{
                arrayLen=array
            }

            if(limit!=null && len!=null){
                //console.log(arrayLen)
                //console.log("No estan vacio limit ni len")
                for(var i=0;i<arrayLen;i++){
                    if(array[i].checked){
                        count++
                    }
                }
                if(limit=="min"){
                    return count>=len?true:false
                }else if(limit=="max"){
                    return count<=len?true:false
                }
            }else{
                //console.log("Estan vacio limit ni len")
                for(var i=0;i<arrayLen;i++){
                    if(array[i].checked){
                        return true
                    }
                }
                return false
            }
        }
    
        if(check(value)){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }

    }
    #isNumber(value){
        if(!isNaN(value)){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #isInteger(value){
        if(Number.isInteger(parseInt(value)) && !value.includes(".")){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #isFloat(value){
        if(!isNaN(value) && value.includes(".")){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #isBoolean(value,result=null){
        if(typeof value=="boolean"){
            this.#result=true
            this.#error=false

            if(result!=null){
                const boolean=JSON.parse(result)
                if(boolean){
                    if(value){
                        this.#result=true
                        this.#error=false
                    }else{
                        this.#count++
                        this.#result=false
                        this.#error=true
                    }
                }else{
                    if(!value){
                        this.#result=true
                        this.#error=false
                    }else{
                        this.#count++
                        this.#result=false
                        this.#error=true
                    }
                }
            }
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #lenMin(value, min){
        
        if(value.length>=min){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #lenMax(value, max){
        if(value.length<=max){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #isArray(value,limit=null,len=null){
        if(Array.isArray(value)){
            this.#result=true
            this.#error=false

            if(limit!=null && len!=null){
                console.log(value)
                if(limit=="min"){
                    if(value.length>=len){
                        this.#result=true
                        this.#error=false
                    }else{
                        this.#count++
                        this.#result=false
                        this.#error=true
                    }

                }else if(limit=="max"){
                    if(value.length<=len){
                        this.#result=true
                        this.#error=false
                    }else{
                        this.#count++
                        this.#result=false
                        this.#error=true
                    }
                }

            }
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #differentTo(value, different){
        if(value!=different){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #equalTo(value, equal){
        if(value==equal){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #isEmail(value){
        const email=(email)=>{
            const regex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/
            return regex.test(email)
        }

        if(email(value)){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #valitedDate(value){
        const formatDate=/^\d{4}-\d{2}-\d{2}$/

        if(formatDate.test(value)){
            const date=new Date(value)
            if(!isNaN(date) || date.toString()!="Invalid Date"){
                //console.log(date.toString())
                this.#result=true
                this.#error=false
            }else{
                //console.log(date.toString())
                this.#count++
                this.#result=false
                this.#error=true
            }

        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #uploadFile(value){
        //console.log(value)
        if(value instanceof  FileList){
            this.#result=true
            this.#error=false
        
            if(value.length>0){
                this.#result=true
                this.#error=false
            }else{
                this.#count++
                this.#result=false
                this.#error=true
            }
        }else if(value instanceof File){
            this.#result=true
            this.#error=false
        }else{
            //console.error("Debe ser FileList o File")
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #sizeFile(value, more, size, UA=null){
        //console.log(value)
        let FileSize

        if(value instanceof  FileList){
            FileSize=value[0].size
        }else if(value instanceof File){
            FileSize=value.size
        }else{
            this.#count++
            this.#result=false
            this.#error=true
            return
        }
        //console.log(FileSize)

        let bytes=1024

        if(UA=="KB"){
            let sizeKB=FileSize/bytes

            if(more=="min"){
                if(size<=sizeKB){
                    this.#result=true
                    this.#error=false
                }else{
                    this.#count++
                    this.#result=false
                    this.#error=true
                }
            }
            else if(more=="max"){
                if(size>=sizeKB){
                    this.#result=true
                    this.#error=false
                }else{
                    this.#count++
                    this.#result=false
                    this.#error=true
                }
            }
        }else{
            if(more=="min"){
                if(size<=FileSize){
                    this.#result=true
                    this.#error=false
                }else{
                    this.#count++
                    this.#result=false
                    this.#error=true
                }
            }
            else if(more=="max"){
                if(size>=FileSize){
                    this.#result=true
                    this.#error=false
                }else{
                    this.#count++
                    this.#result=false
                    this.#error=true
                }
            }
        }
    }
    #typeFile(value, mine){
        //console.log(mine)

        let FileType
        if(value instanceof  FileList){
            FileType=value[0].type
        }else if(value instanceof File){
            FileType=value.type
        }else{
            this.#count++
            this.#result=false
            this.#error=true
            return
        }

        if(mine.includes(FileType)){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #isURL(value){
        try{
            new URL(value)
            this.#result=true
            this.#error=false
        }catch(_){
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #isAlpha(value){
        const regex=/^[A-Za-z]+$/
        if(regex.test(value)){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    #notUse(value,invalid){
        //console.log(invalid)
        const escaped=invalid.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&")
        const regex=new RegExp(`[${escaped}]`)
        if(!regex.test(value)){
            //console.log("No tiene lo solcitado")
            this.#result=true
            this.#error=false
        }else{
            //console.log("Tiene lo solcitado")
            this.#count++
            this.#result=false
            this.#error=true
        }

    }
    #isColor(value){
        //console.log(value)
        const regex=/^#[0-9A-Fa-f]{6}$/
        if(regex.test(value)){
            this.#result=true
            this.#error=false
        }else{
            this.#count++
            this.#result=false
            this.#error=true
        }
    }
    /* */


    formStart=()=>{
        this.#count=0
    }

    formVali=(val,validations)=>{
        this.#result=true
        this.#errorMessage=""
        this.#error=false

        let params=[]

        validations.forEach((validate)=>{

            if(this.#result){
                if(validate.search(/\|/)!= -1){
                    let array=validate.split(/\|/)

                    validate=array[0]

                    params=array.slice(1)
                }

                this.#validators=validate


                switch(validate){
                    //COMPRUEBA SI UN INPUT ESTA VACIO
                    case "required":
                        this.#required(val)
                        break;

                    //VALIDA QUE SOLO SEA CADENAS
                    case "isString":
                        this.#isString(validations)
                        break;

                    //VERIFICA SI SELECCIONO UN INPUT RADIO
                    case "selectRadio":
                        this.#selectRadio(val)
                        break;

                    case "selectCheckBox":
                        this.#selectCheckBox(val,params[0]?params[0]:null,params[1]?params[1]:null)
                        break;

                    //VERIFICA SI ES UN NUMERO
                    case "isNumber":
                        this.#isNumber(val)
                        break;
                    
                    //VERIFICA QUE SEA UN NUMERO ENTERO
                    case "isInteger":
                        this.#isInteger(val)
                        break;

                    //VERIFICA QUE SEA UN DECIMAL
                    case "isFloat":
                        this.#isFloat(val)
                        break;

                    //VERIFICA SI ES UN VALOR BOOLEANO
                    case "isBoolean":
                        this.#isBoolean(val,params[0]?params[0]:null)
                        break;

                    //MINIMA CANTIDAD DE CARACTERES
                    case "lenMin":
                        this.#lenMin(val, params[0])
                        break;

                    //MAXIMO CANTIDAD DE CARACTERES
                    case "lenMax":
                        this.#lenMax(val, params[0])
                        break;
                    
                    //VERIFICA SI ES UN ARRAY
                    case "isArray":
                        this.#isArray(val,params[0]?params[0]:null,params[1]?params[1]:null)
                        break;

                    //VERIFICA QUE SEA DIFERENTE AL VALOR PREDETERMINADO
                    case "differentTo":
                        this.#differentTo(val, params[0])
                        break;

                    //VERIFICA QUE SE IGUAL A VALOR PREDETERMINADO
                    case "equalTo":
                        this.#equalTo(val, params[0])
                        break;

                    //VERIFICA SI ES UN EMAIL Y SE SIGUE SU FORMATO
                    case "isEmail":
                        this.#isEmail(val)
                        break;

                    //VALIDA QUE LA FECHA ESTE EN EL FORMATO YYYY-MM-DD
                    case "valitedDate":
                        this.#valitedDate(val)
                        break;

                    //VALIDA SI SE CARGO UN ARCHIVO
                    case "uploadFile":
                        this.#uploadFile(val)
                        break;

                    //VALIDA EL PESO DE UN ARCHIVO EN KB O bytes
                    case "sizeFile":
                        this.#sizeFile(val,params[0],params[1],params[2]?params[2]:null)
                        break;
                    
                    //VALIDA EL TIPO DE ARCHIVO QUE SE SOLICITA
                    case "typeFile":
                        this.#typeFile(val,params)
                        break;
                    
                    //VALIDA SI EL FORMATO DE URL ES CORRECTO
                    case "isURL":
                        this.#isURL(val)
                        break;

                    //VALIDA CARACTERES ALFABETICOS
                    case "isAlpha":
                        this.#isAlpha(val)
                        break;

                    case "notUse":
                        this.#notUse(val,params[0])
                        break;

                    //VALIDA QUE TENGA EL FORMATO DE COLOR #000000
                    case "isColor":
                        this.#isColor(val)
                        break;
                }

            }

        })
    }

    customVali=(name,validation,result=true)=>{
        //console.log(validation)
        
        this.#validators=name

        if(result){
            if(validation){
                this.#result=true
                this.#error=false
            }else{
                this.#count++
                this.#result=false
                this.#error=true
            }
        }else{
            if(!validation){
                this.#result=true
                this.#error=false
            }else{
                this.#count++
                this.#result=false
                this.#error=true
            }
        }
    }

    formError=(vali, message=null)=>{
        if(this.#error){

            if(!this.#result && this.#validators==vali){
                this.#error=false
                return this.#errorMessage=this.#voidMessage(message)?`${vali} Error`:message
            }else{
                this.#errorMessage=""
                this.#error=true
                return this.#errorMessage
            }

        }else{
            return this.#errorMessage
        }
    }

    resultError=(functionFailed=null,functionSucces=null)=>{
        if(functionFailed!=null && functionFailed!=null){
            if(!this.#result){
                //SOLO QUIERO QUE SE EJECUTE LA PRIMERA FUNCION CALLBACK
                functionFailed()
            }else{
                //SOLO QUIERO QUE SE EJECUTE LA SEGUNDA FUNCION CALLBACK
                functionSucces()
            }

        }else{
            return this.#result?false:true
        }
    }

    formFinal=()=>{
        if(this.#count==0){
            //this.#countGlobal.push(true)
            return true
        }else{
            //this.#countGlobal.push(false)
            return false
        }

    }

    globalForm=(identifier=null, name="")=>{
        if(identifier!=null){
            let arrayExists=this.#countGlobal.find(data=>data[0]==identifier)
    
            if(arrayExists){
                let deleteIndice
    
                if(name!=""){
                    if(arrayExists.includes(`${name} true`)){
                        deleteIndice=`${name} true`
                    }else if(arrayExists.includes(`${name} false`)){
                        deleteIndice=`${name} false`
                    }
                    
                    let indice=arrayExists.indexOf(deleteIndice)
                    arrayExists.splice(indice, 1)
                    //console.log(arrayExists)
    
                    arrayExists.push(this.#count==0?(`${name} true`).trim():(`${name} false`).trim())
                    //console.log(arrayExists)
    
                }else{
                    arrayExists.push(this.#count==0?(`true`).trim():(`false`).trim())
                }
            }else{
                this.#countGlobal.push([identifier,this.#count==0?(`${name} true`).trim():(`${name} false`).trim()])
            }
            //console.log(this.#countGlobal)
    
            if(this.#count==0){
                //this.#countGlobal.push(true)
                return true
            }else{
                //this.#countGlobal.push(false)
                return false
            }

        }
    }

    globalFinal=(identifier)=>{
        //console.log(this.#countGlobal)

        const arrayFind=this.#countGlobal.find(data=>data[0]==identifier)

        if(!arrayFind.some(array=>array.includes("false"))){
            this.#countGlobal=this.#countGlobal.filter(data=>data[0]!=identifier)
            //console.log(this.#countGlobal)
            return true
        }else{
            var findFalse=[]
            var findTrue=[]

            arrayFind.forEach((array, index)=>{
                if(array=="false"){
                    findFalse.push(index)
                }
                if(array=="true"){
                    findTrue.push(index)
                }
            })

            if(findFalse!=0){
                findFalse.forEach(array=>{
                    arrayFind.splice(array, 1)
                })
            }

            if(findTrue.length!=0){
                findTrue.forEach(array=>{
                    arrayFind.splice(array, 1)
                })
            }

            //this.#countGlobal=this.#countGlobal.filter(data=>data[0]!=identifier)
            //console.log(this.#countGlobal)
            return false
        }
    }


}