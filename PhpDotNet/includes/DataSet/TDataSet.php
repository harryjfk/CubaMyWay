<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/17/13
 * Time: 3:22 PM
 * To change this template use File | Settings | File Templates.
 */

include_once('TDataTable.php');
class TDataSet
{
    var $FDataSetName;
    var $FPrefix;
    var $FRelations;
    var $FTables;
    var $FCaseSensitive;
    var $FNamespace;
    var $FEnforceConstraints;
    private function Inicialize(){
        //$this->FRelations = array();
        $this->FTables= new TDataTableCollection();
       $this->FRelations = new TDataRelationCollection();
    }
    public function __construct()
    {
        $this->Inicialize();
    }

//Methods

    public function HasErrors (){ return $this->FErrors; }
    public function  IsInitialized() { return $this->FInitialized; }
    //Propiedades

    public function get_DataSetName() {  return $this->FDataSetName; }
    public function set_DataSetName($datasetname){  $this->FDataSetName=$datasetname;  }
    public function get_Prefix() { return $this->FPrefix; }
    public function set_Prefix($prefix) { $this->FPrefix=$prefix;}
    public function Relations(){return $this->FRelations;}
    public function Tables(){return $this->FTables;}
    public function get_CaseSensitive() {  return $this->FCaseSensitive; }
    public function set_CaseSensitive($casesensitive){  $this->FCaseSensitive=$casesensitive;  }
    public function get_Constraints() {  return $this->FEnforceConstraints; }
    public function set_Constraints($enforceconstraints){  $this->FEnforceConstraints=$enforceconstraints;  }
    public function get_Namespace() {  return $this->FNamespace; }
    public function set_Namespace($namespace){  $this->FNamespace=$namespace;  }

}
/*

        //
        // Resumen:
        //     Inicializa una nueva instancia de una clase System.Data.DataSet que contiene
        //     la información de serialización y el contexto especificados.
        //
        // Parámetros:
        //   info:
        //     Datos necesarios para serializar o deserializar un objeto.
        //
        //   context:
        //     Origen y destino de una secuencia de serialización dada.
        protected DataSet(SerializationInfo info, StreamingContext context);
        //
        // Resumen:
        //     Inicializa una nueva instancia de la clase System.Data.DataSet.
        //
        // Parámetros:
        //   info:
        //     Objeto System.Runtime.Serialization.SerializationInfo.
        //
        //   context:
        //     Objeto System.Runtime.Serialization.StreamingContext.
        //
        //   ConstructSchema:
        //     Valor booleano.
        protected DataSet(SerializationInfo info, StreamingContext context, bool ConstructSchema);



        //
        // Resumen:
        //     Obtiene una vista personalizada de los datos incluidos en System.Data.DataSet,
        //     lo que permite filtrar, buscar y navegar mediante un System.Data.DataViewManager
        //     personalizado.
        //
        // Devuelve:
        //     Objeto System.Data.DataViewManager.
        [Browsable(false)]
        [ResDescription("DataSetDefaultViewDescr")]
        public DataViewManager DefaultViewManager { get; }
        //

        //
        // Resumen:
        //     Obtiene la colección de la información personalizada del usuario asociada
        //     a DataSet.
        //
        // Devuelve:
        //     System.Data.PropertyCollection con toda la información personalizada del
        //     usuario.
        [ResCategory("DataCategory_Data")]
        [ResDescription("ExtendedPropertiesDescr")]
        [Browsable(false)]
        public PropertyCollection ExtendedProperties { get; }
        //

        //
        // Resumen:
        //     Obtiene o establece la información de configuración regional que se utiliza
        //     para comparar cadenas de la tabla.
        //
        // Devuelve:
        //     System.Globalization.CultureInfo que contiene datos sobre la configuración
        //     regional del equipo del usuario.El valor predeterminado es null.
        [ResDescription("DataSetLocaleDescr")]
        [ResCategory("DataCategory_Data")]
        public CultureInfo Locale { get; set; }
        //

        //
        // Resumen:
        //     Obtiene o establece una enumeración System.Data.SerializationFormat para
        //     el objeto System.Data.DataSet utilizado durante la comunicación remota.
        //
        // Devuelve:
        //     Objeto System.Data.SerializationFormat.
        public SerializationFormat RemotingFormat { get; set; }
        //
        // Resumen:
        //     Obtiene o establece una enumeración System.Data.SchemaSerializationMode para
        //     un objeto System.Data.DataSet.
        //
        // Devuelve:
        //     Obtiene o establece una enumeración System.Data.SchemaSerializationMode para
        //     un objeto System.Data.DataSet.
        [Browsable(false)]
        [DesignerSerializationVisibility(DesignerSerializationVisibility.Hidden)]
        public virtual SchemaSerializationMode SchemaSerializationMode { get; set; }
        //
        // Resumen:
        //     Obtiene o establece una interfaz System.ComponentModel.ISite para el objeto
        //     System.Data.DataSet.
        //
        // Devuelve:
        //     Interfaz System.ComponentModel.ISite para el objeto System.Data.DataSet.
        [Browsable(false)]
        [DesignerSerializationVisibility(DesignerSerializationVisibility.Hidden)]
        public override ISite Site { get; set; }
        //
        // Resumen:
        //     Obtiene la colección de tablas incluidas en System.Data.DataSet.
        //
        // Devuelve:
        //     Colección System.Data.DataTableCollection que contiene este objeto System.Data.DataSet.Si
        //     no existe ningún objeto System.Data.DataTable, se devuelve una colección
        //     vacía.
        [ResDescription("DataSetTablesDescr")]
        [ResCategory("DataCategory_Data")]
        [DesignerSerializationVisibility(DesignerSerializationVisibility.Content)]
        public DataTableCollection Tables { get; }

        // Resumen:
        //     Se produce después de inicializar System.Data.DataSet.
        [ResCategory("DataCategory_Action")]
        [ResDescription("DataSetInitializedDescr")]
        public event EventHandler Initialized;
        //
        // Resumen:
        //     Se produce cuando unos System.Data.DataRow de origen y de destino tienen
        //     el mismo valor de clave principal y System.Data.DataSet.EnforceConstraints
        //     se establece en true.
        [ResCategory("DataCategory_Action")]
        [ResDescription("DataSetMergeFailedDescr")]
        public event MergeFailedEventHandler MergeFailed;

        // Resumen:
        //     Confirma todos los cambios realizados en este System.Data.DataSet desde que
        //     se ha cargado o desde la última vez que se ha llamado a System.Data.DataSet.AcceptChanges().
        public void AcceptChanges();
        //
        // Resumen:
        //     Activa la inicialización de un objeto System.Data.DataSet que se emplea en
        //     un formulario o que utiliza otro componente.La inicialización se produce
        //     en tiempo de ejecución.
        public void BeginInit();
        //
        // Resumen:
        //     Borra cualquier dato de System.Data.DataSet mediante el procedimiento de
        //     quitar todas las filas de todas las tablas.
        public void Clear();
        //
        // Resumen:
        //     Copia la estructura de System.Data.DataSet, incluidos todos los esquemas,
        //     relaciones y restricciones de System.Data.DataTable.No copia ningún dato.
        //
        // Devuelve:
        //     Nuevo System.Data.DataSet con el mismo esquema que el System.Data.DataSet
        //     actual, pero sin ningún dato.
        public virtual DataSet Clone();
        //
        // Resumen:
        //     Copia la estructura y los datos para este objeto System.Data.DataSet.
        //
        // Devuelve:
        //     Nuevo System.Data.DataSet con la misma estructura (esquemas, relaciones y
        //     restricciones de tabla) y datos que este System.Data.DataSet.NotaSi estas
        //     clases se han subclasificado, la copia también será de las mismas subclases.
        public DataSet Copy();
        //
        // Resumen:
        //     Devuelve un objeto System.Data.DataTableReader con un conjunto de resultados
        //     por cada System.Data.DataTable, siguiendo la misma secuencia con la que aparecen
        //     las tablas en la colección System.Data.DataSet.Tables.
        //
        // Devuelve:
        //     Objeto System.Data.DataTableReader que contiene uno o varios conjuntos de
        //     resultados, que se corresponden con las instancias de System.Data.DataTable
        //     incluidas en el objeto System.Data.DataSet de origen.
        public DataTableReader CreateDataReader();
        //
        // Resumen:
        //     Devuelve un objeto System.Data.DataTableReader con un conjunto de resultados
        //     por cada System.Data.DataTable.
        //
        // Parámetros:
        //   dataTables:
        //     Matriz de objetos DataTable que proporciona el orden de los conjuntos de
        //     resultados que va a devolver el objeto System.Data.DataTableReader.
        //
        // Devuelve:
        //     Objeto System.Data.DataTableReader que contiene uno o varios conjuntos de
        //     resultados, que se corresponden con las instancias de System.Data.DataTable
        //     incluidas en el objeto System.Data.DataSet de origen.Los conjuntos de resultados
        //     devueltos siguen el orden especificado por el parámetro dataTables.
        public DataTableReader CreateDataReader(params DataTable[] dataTables);
        //
        // Resumen:
        //     Determina la propiedad System.Data.DataSet.SchemaSerializationMode para un
        //     objeto System.Data.DataSet.
        //
        // Parámetros:
        //   reader:
        //     Instancia de System.Xml.XmlReader que se pasa durante la deserialización
        //     del objeto System.Data.DataSet.
        //
        // Devuelve:
        //     Enumeración System.Data.SchemaSerializationMode que indica si la información
        //     de esquema se ha omitido de la carga.
        protected SchemaSerializationMode DetermineSchemaSerializationMode(XmlReader reader);
        //
        // Resumen:
        //     Determina la propiedad System.Data.DataSet.SchemaSerializationMode para un
        //     objeto System.Data.DataSet.
        //
        // Parámetros:
        //   info:
        //     Objeto System.Runtime.Serialization.SerializationInfo con el que se invoca
        //     al constructor protegido System.Data.DataSet.#ctor(System.Runtime.Serialization.SerializationInfo,System.Runtime.Serialization.StreamingContext)
        //     de un objeto DataSet durante la deserialización en escenarios de comunicación
        //     remota.
        //
        //   context:
        //     Objeto System.Runtime.Serialization.StreamingContext con el que se invoca
        //     al constructor protegido System.Data.DataSet.#ctor(System.Runtime.Serialization.SerializationInfo,System.Runtime.Serialization.StreamingContext)
        //     de un objeto DataSet durante la deserialización en escenarios de comunicación
        //     remota.
        //
        // Devuelve:
        //     Enumeración System.Data.SchemaSerializationMode que indica si la información
        //     de esquema se ha omitido de la carga.
        protected SchemaSerializationMode DetermineSchemaSerializationMode(SerializationInfo info, StreamingContext context);
        //
        // Resumen:
        //     Finaliza la inicialización de un control System.Data.DataSet que se emplea
        //     en un formulario o que utiliza otro componente.La inicialización se produce
        //     en tiempo de ejecución.
        public void EndInit();
        //
        // Resumen:
        //     Obtiene una copia del objeto System.Data.DataSet que contiene todos los cambios
        //     que se le han realizado desde que se cargó o se llamó a System.Data.DataSet.AcceptChanges()
        //     por última vez.
        //
        // Devuelve:
        //     Copia de los cambios de este objeto System.Data.DataSet en el que puede que
        //     se hayan realizado acciones y, posteriormente, se hayan vuelto a combinar
        //     mediante el método System.Data.DataSet.Merge(System.Data.DataSet).Si no se
        //     encuentran filas modificadas, el método devuelve null.
        public DataSet GetChanges();
        //
        // Resumen:
        //     Obtiene una copia del objeto System.Data.DataSet que contiene todos los cambios
        //     que se le han realizado desde la última vez que se cargó, o desde que se
        //     llamó a System.Data.DataSet.AcceptChanges(), filtrado por System.Data.DataRowState.
        //
        // Parámetros:
        //   rowStates:
        //     Uno de los valores de System.Data.DataRowState.
        //
        // Devuelve:
        //     Copia filtrada del objeto System.Data.DataSet en el que es posible que se
        //     hayan llevado a cabo acciones y que, por consiguiente, se puede volver a
        //     combinar mediante System.Data.DataSet.Merge(System.Data.DataSet).Si no se
        //     encuentran filas con el System.Data.DataRowState deseado, el método devolverá
        //     null.
        public DataSet GetChanges(DataRowState rowStates);
        //
        // Resumen:
        //     Obtiene una copia de System.Xml.Schema.XmlSchemaSet para el conjunto de datos.
        //
        // Parámetros:
        //   schemaSet:
        //     Conjunto de esquemas especificado.
        //
        // Devuelve:
        //     Una copia de un objeto System.Xml.Schema.XmlSchemaSet.
        public static XmlSchemaComplexType GetDataSetSchema(XmlSchemaSet schemaSet);
        //
        // Resumen:
        //     Rellena un objeto de información de serialización con los datos necesarios
        //     para serializar la clase System.Data.DataSet.
        //
        // Parámetros:
        //   info:
        //     Objeto System.Runtime.Serialization.SerializationInfo que guarda los datos
        //     serializados asociados a la clase System.Data.DataSet.
        //
        //   context:
        //     Un objeto System.Runtime.Serialization.StreamingContext que contiene el origen
        //     y el destino de la secuencia serializada asociada a System.Data.DataSet.
        //
        // Excepciones:
        //   System.ArgumentNullException:
        //     El parámetro info es null.
        public virtual void GetObjectData(SerializationInfo info, StreamingContext context);
        //
        // Resumen:
        //     Devuelve una instancia serializable de System.Xml.Schema.XMLSchema.
        //
        // Devuelve:
        //     Instancia de System.Xml.Schema.XMLSchema.
        protected virtual XmlSchema GetSchemaSerializable();
        //
        // Resumen:
        //     Deserializa los datos de la tabla a partir de la secuencia binaria o XML.
        //
        // Parámetros:
        //   info:
        //     Instancia de System.Runtime.Serialization.SerializationInfo.
        //
        //   context:
        //     Contexto de secuencia.
        protected void GetSerializationData(SerializationInfo info, StreamingContext context);
        //
        // Resumen:
        //     Devuelve la representación XML de los datos almacenados en System.Data.DataSet.
        //
        // Devuelve:
        //     Cadena que es una representación de los datos almacenados en System.Data.DataSet.
        public string GetXml();
        //
        // Resumen:
        //     Devuelve el esquema XML para la representación XML de los datos almacenados
        //     en System.Data.DataSet.
        //
        // Devuelve:
        //     Cadena que es el esquema XML para la representación XML de los datos almacenados
        //     en System.Data.DataSet.
        public string GetXmlSchema();
        //
        // Resumen:
        //     Obtiene un valor que indica si System.Data.DataSet presenta cambios, incluyendo
        //     filas nuevas, eliminadas o modificadas.
        //
        // Devuelve:
        //     true si System.Data.DataSet presenta cambios; de lo contrario, false.
        public bool HasChanges();
        //
        // Resumen:
        //     Obtiene un valor que indica si System.Data.DataSet presenta cambios, incluidas
        //     filas nuevas, eliminadas o modificadas, filtrados por System.Data.DataRowState.
        //
        // Parámetros:
        //   rowStates:
        //     Uno de los valores de System.Data.DataRowState.
        //
        // Devuelve:
        //     true si System.Data.DataSet presenta cambios; de lo contrario, false.
        public bool HasChanges(DataRowState rowStates);
        //
        // Resumen:
        //     Aplica el esquema XML del objeto System.IO.Stream especificado al objeto
        //     System.Data.DataSet.
        //
        // Parámetros:
        //   stream:
        //     Secuencia Stream desde la que se va a leer el esquema.
        //
        //   nsArray:
        //     Matriz de cadenas de identificador de recursos uniforme (URI) del espacio
        //     de nombres que se van a excluir de la deducción del esquema.
        public void InferXmlSchema(Stream stream, string[] nsArray);
        //
        // Resumen:
        //     Aplica el esquema XML del archivo especificado al System.Data.DataSet.
        //
        // Parámetros:
        //   fileName:
        //     Nombre del archivo (incluida la ruta) desde el que se va a leer el esquema.
        //
        //   nsArray:
        //     Matriz de cadenas de identificador de recursos uniforme (URI) del espacio
        //     de nombres que se van a excluir de la deducción del esquema.
        //
        // Excepciones:
        //   System.Security.SecurityException:
        //     System.Security.Permissions.FileIOPermission no está establecido en System.Security.Permissions.FileIOPermissionAccess.Read.
        public void InferXmlSchema(string fileName, string[] nsArray);
        //
        // Resumen:
        //     Aplica el esquema XML del objeto System.IO.TextReader especificado al objeto
        //     System.Data.DataSet.
        //
        // Parámetros:
        //   reader:
        //     TextReader desde el que se va a leer el esquema.
        //
        //   nsArray:
        //     Matriz de cadenas de identificador de recursos uniforme (URI) del espacio
        //     de nombres que se van a excluir de la deducción del esquema.
        public void InferXmlSchema(TextReader reader, string[] nsArray);
        //
        // Resumen:
        //     Aplica el esquema XML del objeto System.Xml.XmlReader especificado al objeto
        //     System.Data.DataSet.
        //
        // Parámetros:
        //   reader:
        //     XMLReader desde el que se va a leer el esquema.
        //
        //   nsArray:
        //     Matriz de cadenas de identificador de recursos uniforme (URI) del espacio
        //     de nombres que se van a excluir de la deducción del esquema.
        public void InferXmlSchema(XmlReader reader, string[] nsArray);
        //
        // Resumen:
        //     Deserializa todos los datos de tablas del conjunto de datos a partir de la
        //     secuencia binaria o XML.
        protected virtual void InitializeDerivedDataSet();
        //
        // Resumen:
        //     Inspecciona el formato de la representación serializada de DataSet.
        //
        // Parámetros:
        //   info:
        //     Objeto System.Runtime.Serialization.SerializationInfo.
        //
        //   context:
        //     Objeto System.Runtime.Serialization.StreamingContext.
        //
        // Devuelve:
        //     Es true si el objeto System.Runtime.Serialization.SerializationInfo especificado
        //     representa un objeto DataSet serializado en su formato binario; en caso contrario,
        //     false.
        protected bool IsBinarySerialized(SerializationInfo info, StreamingContext context);
        //
        // Resumen:
        //     Rellena un objeto System.Data.DataSet de valores de un origen de datos utilizando
        //     la interfaz System.Data.IDataReader proporcionada, que usa una matriz de
        //     instancias de System.Data.DataTable para suministrar la información sobre
        //     el espacio de nombres y el esquema.
        //
        // Parámetros:
        //   reader:
        //     System.Data.IDataReader que proporciona uno o varios conjuntos de resultados.
        //
        //   loadOption:
        //     Valor de la enumeración System.Data.LoadOption que indica cómo se van a combinar
        //     las filas que ya se encuentran en las instancias de System.Data.DataTable,
        //     incluidas en el objeto System.Data.DataSet, con las filas de entrada con
        //     las que comparten la misma clave principal.
        //
        //   tables:
        //     Matriz de instancias de System.Data.DataTable de las que el método System.Data.DataSet.Load(System.Data.IDataReader,System.Data.LoadOption,System.Data.DataTable[])
        //     recupera la información sobre el espacio de nombres y el nombre.Cada una
        //     de estas tablas debe ser un miembro de la colección System.Data.DataTableCollection
        //     que incluye este objeto System.Data.DataSet.
        public void Load(IDataReader reader, LoadOption loadOption, params DataTable[] tables);
        //
        // Resumen:
        //     Rellena un objeto System.Data.DataSet de valores de un origen de datos utilizando
        //     la interfaz System.Data.IDataReader proporcionada, que usa una matriz de
        //     cadenas para suministrar los nombres para las tablas de DataSet.
        //
        // Parámetros:
        //   reader:
        //     System.Data.IDataReader que proporciona uno o varios conjuntos de resultados.
        //
        //   loadOption:
        //     Valor de la enumeración System.Data.LoadOption que indica cómo se van a combinar
        //     las filas que ya se encuentran en las instancias de System.Data.DataTable,
        //     incluidas en el objeto DataSet, con las filas de entrada con las que comparten
        //     la misma clave principal.
        //
        //   tables:
        //     Matriz de cadenas de las que el método Load recupera la información sobre
        //     el nombre de tabla.
        public void Load(IDataReader reader, LoadOption loadOption, params string[] tables);
        //
        // Resumen:
        //     Rellena un objeto System.Data.DataSet de valores de un origen de datos utilizando
        //     la interfaz System.Data.IDataReader proporcionada, que usa una matriz de
        //     instancias de System.Data.DataTable para suministrar la información sobre
        //     el espacio de nombres y el esquema.
        //
        // Parámetros:
        //   reader:
        //     System.Data.IDataReader que proporciona uno o varios conjuntos de resultados.
        //
        //   loadOption:
        //     Valor de la enumeración System.Data.LoadOption que indica cómo se van a combinar
        //     las filas que ya se encuentran en las instancias de System.Data.DataTable,
        //     incluidas en el objeto System.Data.DataSet, con las filas de entrada con
        //     las que comparten la misma clave principal.
        //
        //   errorHandler:
        //     Delegado System.Data.FillErrorEventHandler al que se va a llamar cuando se
        //     produzca un error mientras se cargan los datos.
        //
        //   tables:
        //     Matriz de instancias de System.Data.DataTable de las que el método System.Data.DataSet.Load(System.Data.IDataReader,System.Data.LoadOption,System.Data.FillErrorEventHandler,System.Data.DataTable[])
        //     recupera la información sobre el espacio de nombres y el nombre.
        public virtual void Load(IDataReader reader, LoadOption loadOption, FillErrorEventHandler errorHandler, params DataTable[] tables);
        //
        // Resumen:
        //     Combina una matriz de objetos System.Data.DataRow en el System.Data.DataSet
        //     actual.
        //
        // Parámetros:
        //   rows:
        //     Matriz de objetos DataRow que se va a combinar en el DataSet.
        public void Merge(DataRow[] rows);
        //
        // Resumen:
        //     Combina un objeto System.Data.DataSet especificado y su esquema en el objeto
        //     DataSet actual.
        //
        // Parámetros:
        //   dataSet:
        //     DataSet cuyos datos y esquema se van a combinar.
        //
        // Excepciones:
        //   System.Data.ConstraintException:
        //     No se pueden habilitar una o más restricciones.
        //
        //   System.ArgumentNullException:
        //     El valor del parámetro dataSet es null.
        public void Merge(DataSet dataSet);
        //
        // Resumen:
        //     Combina un objeto System.Data.DataTable especificado y su esquema en el objeto
        //     System.Data.DataSet actual.
        //
        // Parámetros:
        //   table:
        //     Objeto System.Data.DataTable cuyos datos y esquema se van a combinar.
        //
        // Excepciones:
        //   System.ArgumentNullException:
        //     El valor del parámetro dataSet es null.
        public void Merge(DataTable table);
        //
        // Resumen:
        //     Combina un System.Data.DataSet y su esquema en el DataSet actual, conservando
        //     o descartando cualquier cambio efectuado en este DataSet de acuerdo con el
        //     argumento especificado.
        //
        // Parámetros:
        //   dataSet:
        //     DataSet cuyos datos y esquema se van a combinar.
        //
        //   preserveChanges:
        //     true para conservar los cambios realizados en el objeto DataSet actual; de
        //     lo contrario, false.
        public void Merge(DataSet dataSet, bool preserveChanges);
        //
        // Resumen:
        //     Combina una matriz de objetos System.Data.DataRow en el System.Data.DataSet
        //     actual, conservando o descartando los cambios efectuados en el DataSet y
        //     controlando un esquema incompatible de acuerdo con los argumentos especificados.
        //
        // Parámetros:
        //   rows:
        //     Matriz de objetos System.Data.DataRow que se va a combinar en el objeto DataSet.
        //
        //   preserveChanges:
        //     true para conservar los cambios realizados en DataSet; de lo contrario, false.
        //
        //   missingSchemaAction:
        //     Uno de los valores de System.Data.MissingSchemaAction.
        public void Merge(DataRow[] rows, bool preserveChanges, MissingSchemaAction missingSchemaAction);
        //
        // Resumen:
        //     Combina un System.Data.DataSet especificado y su esquema con el DataSet actual,
        //     conservando o descartando los cambios efectuados en el DataSet actual y controlando
        //     un esquema incompatible de acuerdo con los argumentos especificados.
        //
        // Parámetros:
        //   dataSet:
        //     DataSet cuyos datos y esquema se van a combinar.
        //
        //   preserveChanges:
        //     true para conservar los cambios realizados en el objeto DataSet actual; de
        //     lo contrario, false.
        //
        //   missingSchemaAction:
        //     Uno de los valores de System.Data.MissingSchemaAction.
        //
        // Excepciones:
        //   System.ArgumentNullException:
        //     El valor del parámetro dataSet es null.
        public void Merge(DataSet dataSet, bool preserveChanges, MissingSchemaAction missingSchemaAction);
        //
        // Resumen:
        //     Combina un System.Data.DataTable especificado y su esquema en el DataSet
        //     actual, conservando o descartando los cambios efectuados en el DataSet y
        //     controlando un esquema incompatible de acuerdo con los argumentos especificados.
        //
        // Parámetros:
        //   table:
        //     DataTable cuyos datos y esquema se van a combinar.
        //
        //   preserveChanges:
        //     Uno de los valores de System.Data.MissingSchemaAction.
        //
        //   missingSchemaAction:
        //     true para conservar los cambios realizados en DataSet; de lo contrario, false.
        //
        // Excepciones:
        //   System.ArgumentNullException:
        //     El valor del parámetro dataSet es null.
        public void Merge(DataTable table, bool preserveChanges, MissingSchemaAction missingSchemaAction);
        //
        // Resumen:
        //     Provoca el evento System.Data.DataSet.OnPropertyChanging(System.ComponentModel.PropertyChangedEventArgs).
        //
        // Parámetros:
        //   pcevent:
        //     Objeto System.ComponentModel.PropertyChangedEventArgs que contiene los datos
        //     del evento.
        protected virtual void OnPropertyChanging(PropertyChangedEventArgs pcevent);
        //
        // Resumen:
        //     Se produce cuando se quita un objeto System.Data.DataRelation de un System.Data.DataTable.
        //
        // Parámetros:
        //   relation:
        //     Objeto System.Data.DataRelation que se va a quitar.
        protected virtual void OnRemoveRelation(DataRelation relation);
        //
        // Resumen:
        //     Se produce cuando se quita un System.Data.DataTable de un System.Data.DataSet.
        //
        // Parámetros:
        //   table:
        //     Objeto System.Data.DataTable que se va a quitar.
        protected internal virtual void OnRemoveTable(DataTable table);
        //
        // Resumen:
        //     Envía una notificación que indica que se va a cambiar la propiedad especificada
        //     de System.Data.DataSet.
        //
        // Parámetros:
        //   name:
        //     Nombre de la propiedad que se va a cambiar.
        protected internal void RaisePropertyChanging(string name);
        //
        // Resumen:
        //     Lee los datos y el esquema XML del objeto System.Data.DataSet mediante el
        //     objeto System.IO.Stream especificado.
        //
        // Parámetros:
        //   stream:
        //     Objeto que deriva de System.IO.Stream.
        //
        // Devuelve:
        //     System.Data.XmlReadMode utilizado para leer los datos.
        public XmlReadMode ReadXml(Stream stream);
        //
        // Resumen:
        //     Lee el esquema y los datos XML del System.Data.DataSet mediante el archivo
        //     especificado.
        //
        // Parámetros:
        //   fileName:
        //     Nombre del archivo (incluida la ruta) desde el que se va a leer.
        //
        // Devuelve:
        //     XmlReadMode utilizado para leer los datos.
        //
        // Excepciones:
        //   System.Security.SecurityException:
        //     System.Security.Permissions.FileIOPermission no está establecido en System.Security.Permissions.FileIOPermissionAccess.Read.
        public XmlReadMode ReadXml(string fileName);
        //
        // Resumen:
        //     Lee los datos y el esquema XML del objeto System.Data.DataSet mediante el
        //     objeto System.IO.TextReader especificado.
        //
        // Parámetros:
        //   reader:
        //     TextReader desde el que se van a leer el esquema y los datos.
        //
        // Devuelve:
        //     System.Data.XmlReadMode utilizado para leer los datos.
        public XmlReadMode ReadXml(TextReader reader);
        //
        // Resumen:
        //     Lee los datos y el esquema XML del objeto System.Data.DataSet mediante el
        //     objeto System.Xml.XmlReader especificado.
        //
        // Parámetros:
        //   reader:
        //     Objeto System.Xml.XmlReader desde el que se va a leer.
        //
        // Devuelve:
        //     XmlReadMode utilizado para leer los datos.
        public XmlReadMode ReadXml(XmlReader reader);
        //
        // Resumen:
        //     Lee el esquema y los datos XML del objeto System.Data.DataSet mediante el
        //     objeto System.IO.Stream y la enumeración System.Data.XmlReadMode especificados.
        //
        // Parámetros:
        //   stream:
        //     Objeto System.IO.Stream desde el que se va a leer.
        //
        //   mode:
        //     Uno de los valores de System.Data.XmlReadMode.
        //
        // Devuelve:
        //     XmlReadMode utilizado para leer los datos.
        public XmlReadMode ReadXml(Stream stream, XmlReadMode mode);
        //
        // Resumen:
        //     Lee el esquema y los datos XML del System.Data.DataSet mediante el archivo
        //     y el System.Data.XmlReadMode especificados.
        //
        // Parámetros:
        //   fileName:
        //     Nombre del archivo (incluida la ruta) desde el que se va a leer.
        //
        //   mode:
        //     Uno de los valores de System.Data.XmlReadMode.
        //
        // Devuelve:
        //     XmlReadMode utilizado para leer los datos.
        //
        // Excepciones:
        //   System.Security.SecurityException:
        //     System.Security.Permissions.FileIOPermission no está establecido en System.Security.Permissions.FileIOPermissionAccess.Read.
        public XmlReadMode ReadXml(string fileName, XmlReadMode mode);
        //
        // Resumen:
        //     Lee el esquema y los datos XML del objeto System.Data.DataSet mediante el
        //     objeto System.IO.TextReader y la enumeración System.Data.XmlReadMode especificados.
        //
        // Parámetros:
        //   reader:
        //     Objeto System.IO.TextReader desde el que se va a leer.
        //
        //   mode:
        //     Uno de los valores de System.Data.XmlReadMode.
        //
        // Devuelve:
        //     XmlReadMode utilizado para leer los datos.
        public XmlReadMode ReadXml(TextReader reader, XmlReadMode mode);
        //
        // Resumen:
        //     Lee el esquema y los datos XML del objeto System.Data.DataSet mediante el
        //     objeto System.Xml.XmlReader y la enumeración System.Data.XmlReadMode especificados.
        //
        // Parámetros:
        //   reader:
        //     Objeto System.Xml.XmlReader desde el que se va a leer.
        //
        //   mode:
        //     Uno de los valores de System.Data.XmlReadMode.
        //
        // Devuelve:
        //     XmlReadMode utilizado para leer los datos.
        public XmlReadMode ReadXml(XmlReader reader, XmlReadMode mode);
        //
        // Resumen:
        //     Lee el esquema XML del objeto System.IO.Stream especificado en el objeto
        //     System.Data.DataSet.
        //
        // Parámetros:
        //   stream:
        //     Objeto System.IO.Stream desde el que se va a leer.
        public void ReadXmlSchema(Stream stream);
        //
        // Resumen:
        //     Lee el esquema XML del archivo especificado en el System.Data.DataSet.
        //
        // Parámetros:
        //   fileName:
        //     Nombre del archivo (incluida la ruta) desde el que se va a leer.
        //
        // Excepciones:
        //   System.Security.SecurityException:
        //     System.Security.Permissions.FileIOPermission no está establecido en System.Security.Permissions.FileIOPermissionAccess.Read.
        public void ReadXmlSchema(string fileName);
        //
        // Resumen:
        //     Lee el esquema XML del objeto System.IO.TextReader especificado en el objeto
        //     System.Data.DataSet.
        //
        // Parámetros:
        //   reader:
        //     Objeto System.IO.TextReader desde el que se va a leer.
        public void ReadXmlSchema(TextReader reader);
        //
        // Resumen:
        //     Lee el esquema XML del objeto System.Xml.XmlReader especificado en el objeto
        //     System.Data.DataSet.
        //
        // Parámetros:
        //   reader:
        //     Objeto System.Xml.XmlReader desde el que se va a leer.
        public void ReadXmlSchema(XmlReader reader);
        //
        // Resumen:
        //     Omite los atributos y devuelve un conjunto de datos vacío.
        //
        // Parámetros:
        //   reader:
        //     Lector XML especificado.
        protected virtual void ReadXmlSerializable(XmlReader reader);
        //
        // Resumen:
        //     Deshace todos los cambios realizados en el System.Data.DataSet desde que
        //     se ha creado o desde que se ha llamado por última vez a System.Data.DataSet.AcceptChanges().
        public virtual void RejectChanges();
        //
        // Resumen:
        //     Restablece el estado original del objeto System.Data.DataSet.Las subclases
        //     deben reemplazar a System.Data.DataSet.Reset() para restaurar el estado original
        //     de un System.Data.DataSet.
        public virtual void Reset();
        //
        // Resumen:
        //     Obtiene un valor que indica si se debe conservar la propiedad System.Data.DataSet.Relations.
        //
        // Devuelve:
        //     true si el valor de la propiedad ha cambiado con respecto a su valor predeterminado;
        //     de lo contrario, false.
        protected virtual bool ShouldSerializeRelations();
        //
        // Resumen:
        //     Obtiene un valor que indica si se debe conservar la propiedad System.Data.DataSet.Tables.
        //
        // Devuelve:
        //     true si el valor de la propiedad ha cambiado con respecto a su valor predeterminado;
        //     de lo contrario, false.
        protected virtual bool ShouldSerializeTables();
        //
        // Resumen:
        //     Escribe los datos actuales para el objeto System.Data.DataSet mediante el
        //     objeto System.IO.Stream especificado.
        //
        // Parámetros:
        //   stream:
        //     Objeto System.IO.Stream utilizado para escribir en un archivo.
        public void WriteXml(Stream stream);
        //
        // Resumen:
        //     Escribe los datos actuales para el System.Data.DataSet en el archivo especificado.
        //
        // Parámetros:
        //   fileName:
        //     Nombre del archivo (incluida la ruta) en el que se va a escribir.
        //
        // Excepciones:
        //   System.Security.SecurityException:
        //     System.Security.Permissions.FileIOPermission no está establecido en System.Security.Permissions.FileIOPermissionAccess.Write.
        public void WriteXml(string fileName);
        //
        // Resumen:
        //     Escribe los datos actuales para el objeto System.Data.DataSet mediante el
        //     objeto System.IO.TextWriter especificado.
        //
        // Parámetros:
        //   writer:
        //     Objeto System.IO.TextWriter con el que se va a escribir.
        public void WriteXml(TextWriter writer);
        //
        // Resumen:
        //     Escribe los datos actuales para el System.Data.DataSet en el System.Xml.XmlWriter
        //     especificado.
        //
        // Parámetros:
        //   writer:
        //     System.Xml.XmlWriter con el que se va a escribir.
        public void WriteXml(XmlWriter writer);
        //
        // Resumen:
        //     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
        //     System.Data.DataSet mediante el objeto System.IO.Stream y la enumeración
        //     System.Data.XmlWriteMode especificados.Para escribir el esquema, establezca
        //     el valor del parámetro mode en WriteSchema.
        //
        // Parámetros:
        //   stream:
        //     Objeto System.IO.Stream utilizado para escribir en un archivo.
        //
        //   mode:
        //     Uno de los valores de System.Data.XmlWriteMode.
        public void WriteXml(Stream stream, XmlWriteMode mode);
        //
        // Resumen:
        //     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
        //     System.Data.DataSet en el archivo indicado mediante la enumeración System.Data.XmlWriteMode
        //     especificada.Para escribir el esquema, establezca el valor del parámetro
        //     mode en WriteSchema.
        //
        // Parámetros:
        //   fileName:
        //     Nombre del archivo (incluida la ruta) en el que se va a escribir.
        //
        //   mode:
        //     Uno de los valores de System.Data.XmlWriteMode.
        //
        // Excepciones:
        //   System.Security.SecurityException:
        //     System.Security.Permissions.FileIOPermission no está establecido en System.Security.Permissions.FileIOPermissionAccess.Write.
        public void WriteXml(string fileName, XmlWriteMode mode);
        //
        // Resumen:
        //     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
        //     System.Data.DataSet mediante el objeto System.IO.TextWriter y la enumeración
        //     System.Data.XmlWriteMode especificados.Para escribir el esquema, establezca
        //     el valor del parámetro mode en WriteSchema.
        //
        // Parámetros:
        //   writer:
        //     Objeto System.IO.TextWriter que se utiliza para escribir el documento.
        //
        //   mode:
        //     Uno de los valores de System.Data.XmlWriteMode.
        public void WriteXml(TextWriter writer, XmlWriteMode mode);
        //
        // Resumen:
        //     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
        //     System.Data.DataSet mediante el objeto System.Xml.XmlWriter y la enumeración
        //     System.Data.XmlWriteMode especificados.Para escribir el esquema, establezca
        //     el valor del parámetro mode en WriteSchema.
        //
        // Parámetros:
        //   writer:
        //     System.Xml.XmlWriter con el que se va a escribir.
        //
        //   mode:
        //     Uno de los valores de System.Data.XmlWriteMode.
        public void WriteXml(XmlWriter writer, XmlWriteMode mode);
        //
        // Resumen:
        //     Escribe la estructura de System.Data.DataSet como un esquema XML en el objeto
        //     System.IO.Stream especificado.
        //
        // Parámetros:
        //   stream:
        //     Objeto System.IO.Stream utilizado para escribir en un archivo.
        public void WriteXmlSchema(Stream stream);
        //
        // Resumen:
        //     Escribe la estructura del System.Data.DataSet como un esquema XML en un archivo.
        //
        // Parámetros:
        //   fileName:
        //     Nombre del archivo (incluida la ruta) en el que se va a escribir.
        //
        // Excepciones:
        //   System.Security.SecurityException:
        //     System.Security.Permissions.FileIOPermission no está establecido en System.Security.Permissions.FileIOPermissionAccess.Write.
        public void WriteXmlSchema(string fileName);
        //
        // Resumen:
        //     Escribe la estructura de System.Data.DataSet como un esquema XML en el objeto
        //     System.IO.TextWriter especificado.
        //
        // Parámetros:
        //   writer:
        //     Objeto System.IO.TextWriter con el que se va a escribir.
        public void WriteXmlSchema(TextWriter writer);
        //
        // Resumen:
        //     Escribe la estructura del System.Data.DataSet como un esquema XML en un objeto
        //     System.Xml.XmlWriter.
        //
        // Parámetros:
        //   writer:
        //     Clase System.Xml.XmlWriter en la que se va a escribir.
        public void WriteXmlSchema(XmlWriter writer);
        //
        // Resumen:
        //     Escribe la estructura de System.Data.DataSet como un esquema XML en el objeto
        //     System.IO.Stream especificado.
        //
        // Parámetros:
        //   stream:
        //     Un objeto System.IO.Stream en el que se va a escribir.
        //
        //   multipleTargetConverter:
        //     Un delegado usado para convertir System.Type en una cadena.
        public void WriteXmlSchema(Stream stream, Converter<Type, string> multipleTargetConverter);
        //
        // Resumen:
        //     Escribe la estructura del System.Data.DataSet como un esquema XML en un archivo.
        //
        // Parámetros:
        //   fileName:
        //     Nombre del archivo en el que se va a escribir.
        //
        //   multipleTargetConverter:
        //     Un delegado usado para convertir System.Type en una cadena.
        public void WriteXmlSchema(string fileName, Converter<Type, string> multipleTargetConverter);
        //
        // Resumen:
        //     Escribe la estructura de System.Data.DataSet como un esquema XML en el objeto
        //     System.IO.TextWriter especificado.
        //
        // Parámetros:
        //   writer:
        //     Un objeto System.IO.TextWriter en el que se va a escribir.
        //
        //   multipleTargetConverter:
        //     Un delegado usado para convertir System.Type en una cadena.
        public void WriteXmlSchema(TextWriter writer, Converter<Type, string> multipleTargetConverter);
        //
        // Resumen:
        //     Escribe la estructura de System.Data.DataSet como un esquema XML en el objeto
        //     System.Xml.XmlWriter especificado.
        //
        // Parámetros:
        //   writer:
        //     Un objeto System.Xml.XmlWriter en el que se va a escribir.
        //
        //   multipleTargetConverter:
        //     Un delegado usado para convertir System.Type en una cadena.
        public void WriteXmlSchema(XmlWriter writer, Converter<Type, string> multipleTargetConverter);
    }
 */