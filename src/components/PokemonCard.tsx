import React, {FunctionComponent, useState} from "react";
import Pokemon from "../models/pokemon";
import "./pokemon-card.css";
import formatType from "../commons/formatType";
import formatDate from "../commons/formatDate";
import { useHistory } from "react-router";

type Props = {
    pokemon: Pokemon;
    borderColor?: string;
    bordertype?: string;
}

const PokemonCard : FunctionComponent<Props> = ({pokemon, borderColor = "#009688", bordertype ="ridge"}) =>{
    const [color, setColor] = useState<string>();
    const [type, setType] = useState<string>();

    const history = useHistory();

    const showBorder = ()=> {
        setColor(borderColor);
        setType(bordertype);
    }
    const hideBorder = () =>{
        setColor("#f5f5f5");
        setType("solid")
    }

    const viewDetails = (id: number) =>{
        history.push("/pokemons/" + id);
    }

    
    return (
        <div key={pokemon.id} className="col s6 m4" onClick={()=> viewDetails(pokemon.id)} onMouseEnter={showBorder} onMouseLeave={hideBorder} >
            <div className="card horizontal" style={{borderColor: color, borderStyle: type}}>
                
                    <div className="card-image">
                        <img src={pokemon.picture} alt={pokemon.name}/>
                    </div>
                    <div className="card-staked">
                        <div className="card-content">
                            <p>{pokemon.name}</p>
                            <p>
                                <small> {formatDate(pokemon.created)} </small>
                            </p>
                            {pokemon.types.map(type =>(
                                <span key={type} className={formatType(type)}>
                                    {type}
                                </span>
                            ))}
                        </div>
                    </div>
                
            </div>
        </div>
    );
}
export default PokemonCard;


