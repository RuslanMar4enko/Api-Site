export default class CollectionHelpers {


    static map(data: Array, className){
        let result = [];

        if(!data || !Array.isArray(data))
            return result;

        data.forEach((value)=>{
            result.push(new className(value))
        });
        return result
    }


}