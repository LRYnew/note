export default {
    sum: function() {
        let num=0;
        for(let i of arguments) {
            console.log(typeof i == 'number')
            if (typeof i == 'number') {
                num+=i
            }
        }
        return num
    }
}