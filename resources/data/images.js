import { DOMParser, parseHTML } from 'linkedom'
import fs from 'fs'

const _fetchPageHtml = async (link) => {
    const domain = new URL(link).origin
    const page = await fetch(link)
    const html = await page.text()

    const { document } = parseHTML(html)

    return document
}

const links = []

const run = async () => {
    const ships = JSON.parse(fs.readFileSync('formatted-data.json', 'utf-8'))

    for (const ship of ships) {
        console.log(ship.lrn)
        // if (!ship.lrn) {
        //     console.log('No LRN')
        //     console.log(ship.name)
        // } else {
        //     const link = `https://www.vesselfinder.com/vessels/details/${ship.lrn}`
        //     const document = await _fetchPageHtml(link)

        //     const image = document.querySelector('.main-photo').src
        //     links.push(image)

        //     const filename = `${ship.lrn}.jpg`
        //     // const file = fs.createWriteStream(`./images/${filename}`)
        //     // const request = await fetch(image)
        //     // request.body.pipeTo(file)
        //     // console.log(`Downloaded ${filename}`)

        //     const response = await fetch(image);
        //     const arrayBuffer = await response.arrayBuffer();
        //     const buffer = Buffer.from(arrayBuffer, 'binary');
        //     fs.writeFileSync(`./images/${filename}`, buffer);
        // }
    }

    // const uniqueLinks = [...new Set(links)]

    // fs.writeFileSync('images.json', JSON.stringify(uniqueLinks, null, 2))
}

run()
