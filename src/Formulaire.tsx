import React, {FunctionComponent, useState} from 'react';
import { render } from 'react-dom';

const Formulaire: FunctionComponent = ()=>{
    const [saved, setSaved] = useState<String>()

    const handleSubmit = (e: Event)=>{
        e.preventDefault();
    }

    return(
        <div>

        </div>
    );
}

export default Formulaire