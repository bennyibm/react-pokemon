


const formatDate = (date: Date = new Date()): string => {
    let resultDate = date.getDate() + "/" + (date.getMonth() + 1)  + "/" + date.getFullYear() ;
    return resultDate
}

export default formatDate