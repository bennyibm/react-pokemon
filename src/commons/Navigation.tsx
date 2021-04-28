import React, { FunctionComponent } from "react";
import { useHistory } from "react-router";

type Props = {
    url : string
}
const Navigate : FunctionComponent<Props>  = ({url}) =>{

    const history = useHistory();

    const navigate = () =>{
        history.push(url)
    }
    return(
        <div>
            {navigate}
        </div>
    )
}
export default  Navigate