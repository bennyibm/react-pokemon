import React, {FunctionComponent, useState, useEffect, MouseEvent, ChangeEvent} from 'react';

import PokemonsList from './components/PokemonsList';

const Pokedex: FunctionComponent = () => {

    return (
        <div>            
            <PokemonsList />
        </div>
    );
    
}

export default Pokedex;