import fs from 'fs'

const ships = JSON.parse(fs.readFileSync('./ships.json'))
const data = {
    types: [],
    ports: [],
    countries: []
}


ships.forEach(ship => {
    data.types.push(ship.type)
    data.ports.push(ship.port)
    data.countries.push(ship.nationality)
});

const dedupedData = {
    types: [...new Set(data.types)].filter(t => t).sort(),
    ports: [...new Set(data.ports)].filter(p => p).sort(),
    countries: [...new Set(data.countries)].filter(c => c).sort(),
}

fs.writeFileSync('./types.json', JSON.stringify(dedupedData, null, 2))
