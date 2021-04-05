import React, {FunctionComponent, useState} from 'react';

const App: FunctionComponent= () => {
    const [firstName, setFirstName]	= useState<String>('Benny');
    const [lastName, setLastName]	= useState<String>('Nkonga');

    //setFirstName = 'Imboto' ;


    return (
        <h1>Bonjour {firstName} - {lastName}, j'espére que tu vas bien!</h1>
    )
}

export default App;