from rdflib import Graph
from rdflib.namespace import RDF, FOAF, RDFS, OWL
from rdflib import URIRef, BNode, Literal
from rdflib.namespace import XSD
import rdflib
import sys
import json

kelas = eval(sys.argv[1])[0]
individu = eval(sys.argv[1])[1]


RDF.type
RDF.datatype
RDFS.label
RDFS.comment
RDFS.seeAlso
OWL.About


FOAF.knows
# = rdflib.term.URIRef(u'http://xmlns.com/foaf/0.1/knows')

g = Graph()
g.parse("C:\\xampp\\htdocs\\foody\\foody.rdf")


var_kelas = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#"+kelas)
var_individu = URIRef("http://www.semanticweb.org/asus/ontologies/2019/1/untitled-ontology-49#"+individu)


g.add( (var_individu, RDF.type, var_kelas ) )
g.add( (var_individu, RDFS.label, Literal(individu, lang="en")) )

# print g.serialize(format='turtle')

g.serialize("C:\\xampp\\htdocs\\foody\\foody.rdf")