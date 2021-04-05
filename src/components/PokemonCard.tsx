import React, {FunctionComponent, useEffect, useState} from "react";
import Pokemon from "../models/pokemon";
import "./pokemon-card.css";


type Props = {
    pokemon: Pokemon;
    borderColor?: string;
    bordertype?: string;
}
const PokemonCard : FunctionComponent<Props> = ({pokemon, borderColor = "#009688", bordertype ="ridge"}) =>{
    const [color, setColor] = useState<string>();
    const [type, setType] = useState<string>();

    function showBorder(){
        setColor(borderColor);
        setType(bordertype);
    }
    function hideBorder(){
        setColor("#f5f5f5");
        setType("solid")
    }
    
    return (
        <div key={pokemon.id} className="col s6 m4" onMouseEnter={showBorder} onMouseLeave={hideBorder}>
            <div className="card horizontal" style={{borderColor: color, borderStyle: type}}>
                
                    <div className="card-image">
                        <img src={pokemon.picture} alt={pokemon.name}/>
                    </div>
                    <div className="card-staked">
                        <div className="card-content">
                            <p>{pokemon.name}</p>
                            <p>
                                <small> {pokemon.created.toString()} </small>
                            </p>
                        </div>
                    </div>
                
            </div>
        </div>
    );
}
export default PokemonCard;