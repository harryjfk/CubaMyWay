<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Armando Alvarez
 * Date: 10/17/13
 * Time: 3:22 PM
 * To change this template use File | Settings | File Templates.
TIDE::import('TDataColumn');
TIDE::import('TDataRow');
TIDE::import('TList');
 * */

$_SESSION['ide']->import('includes.Common.List');
include_once('TDataRow.php');
include_once('TDataColumn.php');
include_once('TDataRelation.php');
class TDataTable
{
    var $fInitInProgress;
    var $FRows;
    var $FColumns;
    var $FName;
    var $FChildRelations;
    var $FParentRelations;
    var $FPrimaryKeys;
    var $FCaseSentive;
    var $FDataSet;
    var $FDefaultType;
    private function Inicialize(){
        $this->FColumns  = new TDataColumnCollection();
        $this->FRows = new TDataRowCollection($this);
        $this->FChildRelations = new TDataRelationCollection();
        $this->FPrimaryKeys= new TDataColumnCollection();
        $this->FParentRelations = new TDataRelationCollection();
    }
    public function __construct (){$this->Inicialize();}
    public function construct($tablename,$dataset){
        $this->FName=$tablename;
   //     $this->Inicialize();
        $this->FDataSet=$dataset;}
    public function  Clear(){ $this->FRows->Clear();}
    protected function BeginInit(){}
    protected function EndInit(){}
//public DataRow NewRow();
    //Propiedades
    public function Rows(){return $this->FRows;}
    public function Count() {return $this->FRows->Count();}
    public function Row($index){ return $this->FRows->GetItem($index);}
    public function Columns(){return $this->FColumns;}
    public function GetTableName(){return $this->FName;}
    public function SetTableName($name){$this->FName=$name;}
    public function  ChildRelations(){return $this->FChildRelations; }
    public function get_CaseSensitive() { return $this->FCaseSentive;}
    public function set_CaseSensitive($case) {  $this->FCaseSentive=$case;}
    public function DataSet() { return $this->FDataSet; }
//public int MinimumCapacity { get; set; }
    public function  ParentRelations() { return $this->FParentRelations; }
    public function  PrimaryKeys() {return $this->FPrimaryKeys;}
    public function  DefaultType($value=null)
    {
        if ($value==null)
            return $this->FDefaultType;
        else
        {
            $this->FDefaultType = $value;

        }
    }
}
class TDataTableCollection extends TList
{

    public function __construct(){}

}

/*

// Resumen:
//     Inicializa una nueva instancia de la clase System.Data.DataTable con el objeto
//     System.Runtime.Serialization.SerializationInfo y la estructura System.Runtime.Serialization.StreamingContext.
//
// Par??metros:
//   info:
//     Datos necesarios para serializar o deserializar un objeto.
//
//   context:
//     Origen y destino de una secuencia de serializaci??n dada.
protected DataTable(SerializationInfo info, StreamingContext context);

//
//
// Resumen:
//     Obtiene la colecci??n de restricciones mantenidas por esta tabla.
//
// Devuelve:
//     Objeto System.Data.ConstraintCollection que contiene la colecci??n de objetos
//     System.Data.Constraint para la tabla.Si no existe ning??n objeto System.Data.Constraint,
//     se devuelve una colecci??n vac??a.
[DesignerSerializationVisibility(DesignerSerializationVisibility.Content)]
[ResCategory("DataCategory_Data")]
[ResDescription("DataTableConstraintsDescr")]
public ConstraintCollection Constraints { get; }

//
// Resumen:
//     Obtiene una vista personalizada de la tabla que puede incluir una vista filtrada
//     o una posici??n del cursor.
//
// Devuelve:
//     Objeto System.Data.DataView asociado al objeto System.Data.DataTable.
[ResDescription("DataTableDefaultViewDescr")]
[Browsable(false)]
public DataView DefaultView { get; }
//
// Resumen:
//     Obtiene o establece la expresi??n que devuelve un valor utilizado para representar
//     esta tabla en la interfaz de usuario.La propiedad DisplayExpression permite
//     mostrar el nombre de esta tabla en una interfaz de usuario.
//
// Devuelve:
//     Cadena de representaci??n.
[ResDescription("DataTableDisplayExpressionDescr")]
[DefaultValue("")]
[ResCategory("DataCategory_Data")]
public string DisplayExpression { get; set; }
//

//
// Resumen:
//     Obtiene o establece la informaci??n de configuraci??n regional que se utiliza
//     para comparar cadenas de la tabla.
//
// Devuelve:
//     System.Globalization.CultureInfo que contiene datos sobre la configuraci??n
//     regional del equipo del usuario.El valor predeterminado es System.Globalization.CultureInfo
//     del objeto System.Data.DataSet (devuelto por la propiedad System.Data.DataSet.Locale)
//     al que pertenece System.Data.DataTable; si la tabla no pertenece a ning??n
//     System.Data.DataSet, el valor predeterminado es System.Globalization.CultureInfo
//     del sistema actual.
[ResDescription("DataTableLocaleDescr")]
public CultureInfo Locale { get; set; }
//



//
// Resumen:
//     Obtiene o establece el formato de serializaci??n.
//
// Devuelve:
//     Enumeraci??n System.Data.SerializationFormat que especifica si la serializaci??n
//     es Binary o Xml.
public SerializationFormat RemotingFormat { get; set; }

// Resumen:
//     Obtiene o establece una interfaz System.ComponentModel.ISite para el objeto
//     System.Data.DataTable.
//
// Devuelve:
//     Interfaz System.ComponentModel.ISite para el objeto System.Data.DataTable.
[DesignerSerializationVisibility(DesignerSerializationVisibility.Hidden)]
[Browsable(false)]
public override ISite Site { get; set; }


// Resumen:
//     Se produce cuando se ha cambiado un valor para el System.Data.DataColumn
//     especificado de un System.Data.DataRow.
[ResDescription("DataTableColumnChangedDescr")]
[ResCategory("DataCategory_Data")]
public event DataColumnChangeEventHandler ColumnChanged;
//
// Resumen:
//     Se produce cuando se ha cambiado un valor para el System.Data.DataColumn
//     especificado de un System.Data.DataRow.
[ResCategory("DataCategory_Data")]
[ResDescription("DataTableColumnChangingDescr")]
public event DataColumnChangeEventHandler ColumnChanging;
//
// Resumen:
//     Se produce despu??s de inicializar System.Data.DataTable.
[ResDescription("DataSetInitializedDescr")]
[ResCategory("DataCategory_Action")]
public event EventHandler Initialized;
//
// Resumen:
//     Se produce despu??s de cambiar correctamente un objeto System.Data.DataRow.
[ResDescription("DataTableRowChangedDescr")]
[ResCategory("DataCategory_Data")]
public event DataRowChangeEventHandler RowChanged;
//
// Resumen:
//     Se produce cuando se cambia un System.Data.DataRow.
[ResDescription("DataTableRowChangingDescr")]
[ResCategory("DataCategory_Data")]
public event DataRowChangeEventHandler RowChanging;
//
// Resumen:
//     Se produce despu??s de eliminar una fila de la tabla.
[ResCategory("DataCategory_Data")]
[ResDescription("DataTableRowDeletedDescr")]
public event DataRowChangeEventHandler RowDeleted;
//
// Resumen:
//     Se produce cuando se va a eliminar una fila de la tabla.
[ResDescription("DataTableRowDeletingDescr")]
[ResCategory("DataCategory_Data")]
public event DataRowChangeEventHandler RowDeleting;
//
// Resumen:
//     Se produce despu??s de borrar un objeto System.Data.DataTable.
[ResDescription("DataTableRowsClearedDescr")]
[ResCategory("DataCategory_Data")]
public event DataTableClearEventHandler TableCleared;
//
// Resumen:
//     Se produce cuando se borra un objeto System.Data.DataTable.
[ResCategory("DataCategory_Data")]
[ResDescription("DataTableRowsClearingDescr")]
public event DataTableClearEventHandler TableClearing;
//
// Resumen:
//     Se produce cuando se inserta un nuevo objeto System.Data.DataRow.
[ResCategory("DataCategory_Data")]
[ResDescription("DataTableRowsNewRowDescr")]
public event DataTableNewRowEventHandler TableNewRow;

// Resumen:
//     Confirma todos los cambios realizados en esta tabla desde la ??ltima vez que
//     se llam?? a System.Data.DataTable.AcceptChanges().
public void AcceptChanges();
//
// Resumen:
//     Activa la inicializaci??n de un objeto System.Data.DataTable que se emplea
//     en un formulario o que utiliza otro componente.La inicializaci??n se produce
//     en tiempo de ejecuci??n.
public virtual void BeginInit();
//
// Resumen:
//     Desactiva notificaciones, mantenimiento de ??ndices y restricciones mientras
//     se cargan datos.
public void BeginLoadData();
//

//
// Resumen:
//     Clona la estructura de System.Data.DataTable, incluidos todos los esquemas
//     y restricciones de System.Data.DataTable.
//
// Devuelve:
//     Nuevo System.Data.DataTable con el mismo esquema que el System.Data.DataTable
//     actual.
public virtual DataTable Clone();
//
// Resumen:
//     Calcula la expresi??n dada de las filas actuales que cumplen los criterios
//     de filtro.
//
// Par??metros:
//   expression:
//     Expresi??n que se va a calcular.
//
//   filter:
//     Filtro que va a limitar las filas que se eval??an en la expresi??n.
//
// Devuelve:
//     System.Object establecido en el resultado del c??lculo.
public object Compute(string expression, string filter);
//
// Resumen:
//     Copia la estructura y los datos para este objeto System.Data.DataTable.
//
// Devuelve:
//     Nuevo System.Data.DataTable con la misma estructura (esquemas y restricciones
//     de tabla) y datos que este System.Data.DataTable.Si estas clases se han derivado,
//     la copia tambi??n ser?? de las mismas clases derivadas.Los m??todos System.Data.DataTable.Copy()
//     y System.Data.DataTable.Clone() crean un nuevo objeto DataTable con la misma
//     estructura que el objeto DataTable original.El nuevo objeto DataTable creado
//     por el m??todo System.Data.DataTable.Copy() tiene el mismo conjunto de DataRows
//     que la tabla original, pero el nuevo objeto DataTable creado por el m??todo
//     System.Data.DataTable.Clone() no contiene DataRows.
public DataTable Copy();
//
// Resumen:
//     Devuelve un objeto System.Data.DataTableReader que corresponde a los datos
//     incluidos en este objeto System.Data.DataTable.
//
// Devuelve:
//     Objeto System.Data.DataTableReader que contiene un conjunto de resultados,
//     que corresponde a la instancia de System.Data.DataTable de origen.
public DataTableReader CreateDataReader();
//
// Resumen:
//     Crea una nueva instancia de System.Data.DataTable.
//
// Devuelve:
//     La nueva expresi??n.
protected virtual DataTable CreateInstance();
//
// Resumen:
//     Finaliza la inicializaci??n de un objeto System.Data.DataTable que se emplea
//     en un formulario o que usa otro componente.La inicializaci??n se produce en
//     tiempo de ejecuci??n.
public virtual void EndInit();
//
// Resumen:
//     Activa notificaciones, mantenimiento de ??ndices y restricciones despu??s de
//     cargar datos.
public void EndLoadData();
//
// Resumen:
//     Obtiene una copia del objeto System.Data.DataTable que contiene todos los
//     cambios que se le han realizado desde que se carg?? o se llam?? a System.Data.DataTable.AcceptChanges()
//     por ??ltima vez.
//
// Devuelve:
//     Copia de los cambios de este System.Data.DataTable, o null si no se encuentra
//     ning??n cambio.
public DataTable GetChanges();
//
// Resumen:
//     Obtiene una copia del objeto System.Data.DataTable que contiene todos los
//     cambios que se le han realizado desde la ??ltima vez que se carg??, o desde
//     que se llam?? a System.Data.DataTable.AcceptChanges(), filtrado por System.Data.DataRowState.
//
// Par??metros:
//   rowStates:
//     Uno de los valores de System.Data.DataRowState.
//
// Devuelve:
//     Una copia filtrada del objeto System.Data.DataTable en el que puede que se
//     hayan realizado acciones y, posteriormente, se hayan vuelto a combinar en
//     System.Data.DataTable utilizando el m??todo System.Data.DataSet.Merge(System.Data.DataSet).Si
//     no se encuentran filas con el System.Data.DataRowState deseado, el m??todo
//     devolver?? null.
public DataTable GetChanges(DataRowState rowStates);
//
// Resumen:
//     Este m??todo devuelve una instancia de System.Xml.Schema.XmlSchemaSet que
//     contiene el Lenguaje de descripci??n de servicios Web (WSDL) que describe
//     System.Data.DataTable para servicios Web.
//
// Par??metros:
//   schemaSet:
//     Una instancia de System.Xml.Schema.XmlSchemaSet.
//
// Devuelve:
//     Instancia de System.Xml.Schema.XmlSchemaSet.
public static XmlSchemaComplexType GetDataTableSchema(XmlSchemaSet schemaSet);
//
// Resumen:
//     Obtiene una matriz de objetos System.Data.DataRow que contienen errores.
//
// Devuelve:
//     Matriz de objetos System.Data.DataRow que tienen errores.
public DataRow[] GetErrors();
//
// Resumen:
//     Rellena un objeto de informaci??n de serializaci??n con los datos necesarios
//     para serializar la clase System.Data.DataTable.
//
// Par??metros:
//   info:
//     Objeto System.Runtime.Serialization.SerializationInfo que contiene los datos
//     serializados asociados a System.Data.DataTable.
//
//   context:
//     Objeto System.Runtime.Serialization.StreamingContext que contiene el origen
//     y el destino de la secuencia serializada asociada a System.Data.DataTable.
//
// Excepciones:
//   System.ArgumentNullException:
//     El par??metro info es una referencia nula (Nothing en Visual Basic).
public virtual void GetObjectData(SerializationInfo info, StreamingContext context);
//
// Resumen:
//     Obtiene el tipo de fila.
//
// Devuelve:
//     Devuelve el tipo de System.Data.DataRow.
protected virtual Type GetRowType();
//
// Resumen:
//     Para obtener una descripci??n de este miembro, vea System.Xml.Serialization.IXmlSerializable.GetSchema().
//
// Devuelve:
//     Un objeto System.Xml.Schema.XmlSchema que describe la representaci??n XML
//     del objeto producido por el m??todo System.Xml.Serialization.IXmlSerializable.WriteXml(System.Xml.XmlWriter)
//     y utilizado por el m??todo System.Xml.Serialization.IXmlSerializable.ReadXml(System.Xml.XmlReader).
protected virtual XmlSchema GetSchema();
//
// Resumen:
//     Copia un System.Data.DataRow en un System.Data.DataTable conservando los
//     valores de propiedad, as?? como los valores originales y actuales.
//
// Par??metros:
//   row:
//     System.Data.DataRow que se va a importar.
public void ImportRow(DataRow row);
//
// Resumen:
//     Rellena un objeto System.Data.DataTable con valores de un origen de datos
//     utilizando la interfaz System.Data.IDataReader proporcionada.Si el objeto
//     System.Data.DataTable ya contiene filas, los datos de entrada del origen
//     de datos se combinan con las filas existentes.
//
// Par??metros:
//   reader:
//     Interfaz System.Data.IDataReader que proporciona un conjunto de resultados.
public void Load(IDataReader reader);
//
// Resumen:
//     Rellena un objeto System.Data.DataTable con valores de un origen de datos
//     utilizando la interfaz System.Data.IDataReader proporcionada.Si el objeto
//     DataTable ya contiene las filas, los datos de entrada del origen de datos
//     se combinan con las filas existentes conforme al valor del par??metro loadOption.
//
// Par??metros:
//   reader:
//     System.Data.IDataReader que proporciona uno o varios conjuntos de resultados.
//
//   loadOption:
//     Valor de la enumeraci??n System.Data.LoadOption que indica c??mo se combinan
//     las filas que ya existen en el objeto System.Data.DataTable con las filas
//     de entrada con las que comparten la misma clave principal.
public void Load(IDataReader reader, LoadOption loadOption);
//
// Resumen:
//     Rellena un objeto System.Data.DataTable con valores de un origen de datos
//     utilizando la interfaz System.Data.IDataReader proporcionada y un delegado
//     de control de errores.
//
// Par??metros:
//   reader:
//     Interfaz System.Data.IDataReader que proporciona un conjunto de resultados.
//
//   loadOption:
//     Valor de la enumeraci??n System.Data.LoadOption que indica c??mo se combinan
//     las filas que ya existen en el objeto System.Data.DataTable con las filas
//     de entrada con las que comparten la misma clave principal.
//
//   errorHandler:
//     Delegado System.Data.FillErrorEventHandler al que se va a llamar cuando se
//     produzca un error mientras se cargan los datos.
public virtual void Load(IDataReader reader, LoadOption loadOption, FillErrorEventHandler errorHandler);
//
// Resumen:
//     Busca y actualiza una fila espec??fica.Si no encuentra ninguna fila coincidente,
//     se crea una nueva con los valores dados.
//
// Par??metros:
//   values:
//     Matriz de valores utilizada para crear la nueva fila.
//
//   fAcceptChanges:
//     true para aceptar los cambios; de lo contrario, false.
//
// Devuelve:
//     El nuevo marco System.Data.DataRow.
//
// Excepciones:
//   System.ArgumentException:
//     La matriz es mayor que el n??mero de columnas de la tabla.
//
//   System.InvalidCastException:
//     Un valor no coincide con su tipo de columna respectivo.
//
//   System.Data.ConstraintException:
//     La adici??n de la fila invalida una restricci??n.
//
//   System.Data.NoNullAllowedException:
//     Intento de colocar un valor nulo donde System.Data.DataColumn.AllowDBNull
//     sea falso.
public DataRow LoadDataRow(object[] values, bool fAcceptChanges);
//
// Resumen:
//     Busca y actualiza una fila espec??fica.Si no encuentra ninguna fila coincidente,
//     se crea una nueva con los valores dados.
//
// Par??metros:
//   values:
//     Matriz de valores utilizada para crear la nueva fila.
//
//   loadOption:
//     Se utiliza para determinar c??mo se aplican los valores de la matriz a los
//     valores correspondientes en una fila existente.
//
// Devuelve:
//     El nuevo marco System.Data.DataRow.
public DataRow LoadDataRow(object[] values, LoadOption loadOption);
//
// Resumen:
//     Combina el objeto System.Data.DataTable especificado con el objeto System.Data.DataTable
//     actual.
//
// Par??metros:
//   table:
//     Objeto System.Data.DataTable que se va a combinar con el objeto System.Data.DataTable
//     actual.
public void Merge(DataTable table);
//
// Resumen:
//     Combina el objeto System.Data.DataTable especificado con el objeto DataTable
//     actual, indicando si se deben conservar los cambios en el objeto DataTable
//     actual.
//
// Par??metros:
//   table:
//     Objeto DataTable que se va a combinar con el objeto DataTable actual.
//
//   preserveChanges:
//     true para conservar los cambios realizados en el objeto DataTable actual;
//     de lo contrario, false.
public void Merge(DataTable table, bool preserveChanges);
//
// Resumen:
//     Combina el objeto System.Data.DataTable especificado con el objeto DataTable
//     actual, indicando si se van a conservar los cambios y c??mo se va a controlar
//     el esquema que falta en el objeto DataTable actual.
//
// Par??metros:
//   table:
//     Objeto System.Data.DataTable que se va a combinar con el objeto System.Data.DataTable
//     actual.
//
//   preserveChanges:
//     true para conservar los cambios realizados en el objeto System.Data.DataTable
//     actual; de lo contrario, false.
//
//   missingSchemaAction:
//     Uno de los valores de System.Data.MissingSchemaAction.
public void Merge(DataTable table, bool preserveChanges, MissingSchemaAction missingSchemaAction);
//

//
// Resumen:
//     Devuelve una matriz de objetos System.Data.DataRow.
//
// Par??metros:
//   size:
//     Un valor System.Int32 que describe el tama??o de la matriz.
//
// Devuelve:
//     Nueva matriz.
protected internal DataRow[] NewRowArray(int size);
//
// Resumen:
//     Crea una nueva fila a partir de una existente.
//
// Par??metros:
//   builder:
//     Objeto System.Data.DataRowBuilder.
//
// Devuelve:
//     Clase derivada System.Data.DataRow.
protected virtual DataRow NewRowFromBuilder(DataRowBuilder builder);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.ColumnChanged.
//
// Par??metros:
//   e:
//     System.Data.DataColumnChangeEventArgs que contiene los datos del evento.
protected internal virtual void OnColumnChanged(DataColumnChangeEventArgs e);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.ColumnChanging.
//
// Par??metros:
//   e:
//     Control System.Data.DataColumnChangeEventArgs que contiene los datos del
//     evento.
protected internal virtual void OnColumnChanging(DataColumnChangeEventArgs e);
//
// Resumen:
//     Provoca el evento System.ComponentModel.INotifyPropertyChanged.PropertyChanged.
//
// Par??metros:
//   pcevent:
//     Control System.ComponentModel.PropertyChangedEventArgs que contiene los datos
//     del evento.
protected virtual void OnPropertyChanging(PropertyChangedEventArgs pcevent);
//
// Resumen:
//     Notifica a System.Data.DataTable que se ha quitado un System.Data.DataColumn.
//
// Par??metros:
//   column:
//     Objeto System.Data.DataColumn que se va a quitar.
protected virtual void OnRemoveColumn(DataColumn column);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.RowChanged.
//
// Par??metros:
//   e:
//     Control System.Data.DataRowChangeEventArgs que contiene los datos del evento.
protected virtual void OnRowChanged(DataRowChangeEventArgs e);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.RowChanging.
//
// Par??metros:
//   e:
//     Control System.Data.DataRowChangeEventArgs que contiene los datos del evento.
protected virtual void OnRowChanging(DataRowChangeEventArgs e);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.RowDeleted.
//
// Par??metros:
//   e:
//     Control System.Data.DataRowChangeEventArgs que contiene los datos del evento.
protected virtual void OnRowDeleted(DataRowChangeEventArgs e);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.RowDeleting.
//
// Par??metros:
//   e:
//     Control System.Data.DataRowChangeEventArgs que contiene los datos del evento.
protected virtual void OnRowDeleting(DataRowChangeEventArgs e);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.TableCleared.
//
// Par??metros:
//   e:
//     System.Data.DataTableClearEventArgs que contiene los datos del evento.
protected virtual void OnTableCleared(DataTableClearEventArgs e);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.TableClearing.
//
// Par??metros:
//   e:
//     System.Data.DataTableClearEventArgs que contiene los datos del evento.
protected virtual void OnTableClearing(DataTableClearEventArgs e);
//
// Resumen:
//     Provoca el evento System.Data.DataTable.TableNewRow.
//
// Par??metros:
//   e:
//     System.Data.DataTableNewRowEventArgs que contiene los datos de eventos.
protected virtual void OnTableNewRow(DataTableNewRowEventArgs e);
//
// Resumen:
//     Lee los datos y el esquema XML en el objeto System.Data.DataTable mediante
//     el objeto System.IO.Stream especificado.
//
// Par??metros:
//   stream:
//     Objeto que se deriva de System.IO.Stream.
//
// Devuelve:
//     System.Data.XmlReadMode utilizado para leer los datos.
public XmlReadMode ReadXml(Stream stream);
//
// Resumen:
//     Lee los datos y el esquema XML en el objeto System.Data.DataTable desde el
//     archivo especificado.
//
// Par??metros:
//   fileName:
//     Nombre del archivo del que se van a leer los datos.
//
// Devuelve:
//     System.Data.XmlReadMode utilizado para leer los datos.
public XmlReadMode ReadXml(string fileName);
//
// Resumen:
//     Lee los datos y el esquema XML en el objeto System.Data.DataTable mediante
//     el objeto System.IO.TextReader especificado.
//
// Par??metros:
//   reader:
//     Objeto System.IO.TextReader que se va a usar para leer los datos.
//
// Devuelve:
//     System.Data.XmlReadMode utilizado para leer los datos.
public XmlReadMode ReadXml(TextReader reader);
//
// Resumen:
//     Lee datos y el esquema XML en el objeto System.Data.DataTable mediante el
//     objeto System.Xml.XmlReader especificado.
//
// Par??metros:
//   reader:
//     System.Xml.XmlReader que se va a utilizar para leer los datos.
//
// Devuelve:
//     System.Data.XmlReadMode utilizado para leer los datos.
public XmlReadMode ReadXml(XmlReader reader);
//
// Resumen:
//     Lee un esquema XML en el objeto System.Data.DataTable utilizando la secuencia
//     especificada.
//
// Par??metros:
//   stream:
//     Secuencia que se utiliza para leer el esquema.
public void ReadXmlSchema(Stream stream);
//
// Resumen:
//     Lee un esquema XML en el objeto System.Data.DataTable desde el archivo especificado.
//
// Par??metros:
//   fileName:
//     Nombre del archivo del que se va a leer la informaci??n de esquema.
public void ReadXmlSchema(string fileName);
//
// Resumen:
//     Lee un esquema XML en el objeto System.Data.DataTable utilizando el objeto
//     System.IO.TextReader especificado.
//
// Par??metros:
//   reader:
//     Objeto System.IO.TextReader que se utiliza para leer la informaci??n del esquema.
public void ReadXmlSchema(TextReader reader);
//
// Resumen:
//     Lee un esquema XML en el objeto System.Data.DataTable utilizando el objeto
//     System.Xml.XmlReader especificado.
//
// Par??metros:
//   reader:
//     Objeto System.Xml.XmlReader que se utiliza para leer la informaci??n del esquema.
public void ReadXmlSchema(XmlReader reader);
//
// Resumen:
//     Lee de una secuencia XML.
//
// Par??metros:
//   reader:
//     Un objeto System.Xml.XmlReader.
protected virtual void ReadXmlSerializable(XmlReader reader);
//
// Resumen:
//     Deshace todos los cambios que se hayan realizado en la tabla desde que se
//     carg?? o se llam?? a System.Data.DataTable.AcceptChanges() por ??ltima vez.
public void RejectChanges();
//
// Resumen:
//     Restablece el estado original del objeto System.Data.DataTable.
public virtual void Reset();
//
// Resumen:
//     Obtiene una matriz de todos los objetos System.Data.DataRow.
//
// Devuelve:
//     Matriz de objetos System.Data.DataRow.
public DataRow[] Select();
//
// Resumen:
//     Obtiene una matriz de todos los objetos System.Data.DataRow que coinciden
//     con los criterios de filtro por orden de clave principal (o si ??sta no existe,
//     por orden de adici??n).
//
// Par??metros:
//   filterExpression:
//     Criterios que se van a utilizar para filtrar las filas.
//
// Devuelve:
//     Matriz de objetos System.Data.DataRow.
public DataRow[] Select(string filterExpression);
//
// Resumen:
//     Obtiene una matriz de todos los objetos System.Data.DataRow que coinciden
//     con los criterios de filtro, en el criterio de ordenaci??n especificado.
//
// Par??metros:
//   filterExpression:
//     Criterios que se van a utilizar para filtrar las filas.
//
//   sort:
//     Cadena que especifica la columna y orden de clasificaci??n.
//
// Devuelve:
//     Matriz de objetos System.Data.DataRow que coinciden con la expresi??n de filtro.
public DataRow[] Select(string filterExpression, string sort);
//
// Resumen:
//     Obtiene una matriz de todos los objetos System.Data.DataRow que coinciden
//     con el filtro en el orden de clasificaci??n y que coinciden con el estado
//     especificado.
//
// Par??metros:
//   filterExpression:
//     Criterios que se van a utilizar para filtrar las filas.
//
//   sort:
//     Cadena que especifica la columna y orden de clasificaci??n.
//
//   recordStates:
//     Uno de los valores de System.Data.DataViewRowState.
//
// Devuelve:
//     Matriz de objetos System.Data.DataRow.
public DataRow[] Select(string filterExpression, string sort, DataViewRowState recordStates);
//
// Resumen:
//     Obtiene System.Data.DataTable.TableName y System.Data.DataTable.DisplayExpression,
//     si hay alguna, como cadena concatenada.
//
// Devuelve:
//     Cadena compuesta por los valores System.Data.DataTable.TableName y System.Data.DataTable.DisplayExpression.
public override string ToString();
//
// Resumen:
//     Escribe el contenido actual del objeto System.Data.DataTable como elemento
//     XML utilizando el objeto System.IO.Stream especificado.
//
// Par??metros:
//   stream:
//     Secuencia en la que se van a escribir los datos.
public void WriteXml(Stream stream);
//
// Resumen:
//     Escribe el contenido actual del objeto System.Data.DataTable como elemento
//     XML utilizando el archivo especificado.
//
// Par??metros:
//   fileName:
//     Archivo en el que se escriben los datos XML
public void WriteXml(string fileName);
//
// Resumen:
//     Escribe el contenido actual del objeto System.Data.DataTable como XML utilizando
//     el objeto System.IO.TextWriter especificado.
//
// Par??metros:
//   writer:
//     Objeto System.IO.TextWriter con el que se va a escribir el contenido.
public void WriteXml(TextWriter writer);
//
// Resumen:
//     Escribe el contenido actual del objeto System.Data.DataTable como XML utilizando
//     el objeto System.Xml.XmlWriter especificado.
//
// Par??metros:
//   writer:
//     Objeto System.Xml.XmlWriter con el que se va a escribir el contenido.
public void WriteXml(XmlWriter writer);
//
// Resumen:
//     Escribe el contenido actual del objeto System.Data.DataTable como elemento
//     XML utilizando el objeto System.IO.Stream especificado.Para guardar los datos
//     de la tabla y de todos sus descendientes, establezca el par??metro writeHierarchy
//     en true.
//
// Par??metros:
//   stream:
//     Secuencia en la que se van a escribir los datos.
//
//   writeHierarchy:
//     Si es true, escribe el contenido de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), escribe s??lo los datos para la tabla actual.
public void WriteXml(Stream stream, bool writeHierarchy);
//
// Resumen:
//     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
//     System.Data.DataTable en el archivo indicado mediante la enumeraci??n System.Data.XmlWriteMode
//     especificada.Para escribir el esquema, establezca el valor del par??metro
//     mode en WriteSchema.
//
// Par??metros:
//   stream:
//     Secuencia en la que se van a escribir los datos.
//
//   mode:
//     Uno de los valores de System.Data.XmlWriteMode.
public void WriteXml(Stream stream, XmlWriteMode mode);
//
// Resumen:
//     Escribe el contenido actual del objeto System.Data.DataTable como elemento
//     XML utilizando el archivo especificado.Para guardar los datos de la tabla
//     y de todos sus descendientes, establezca el par??metro writeHierarchy en true.
//
// Par??metros:
//   fileName:
//     Archivo en el que se escriben los datos XML
//
//   writeHierarchy:
//     Si es true, escribe el contenido de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), escribe s??lo los datos para la tabla actual.
public void WriteXml(string fileName, bool writeHierarchy);
//
// Resumen:
//     Escribe los datos actuales y, de forma opcional, el esquema para el System.Data.DataTable
//     mediante el archivo y la enumeraci??n System.Data.XmlWriteMode especificados.Para
//     escribir el esquema, establezca el valor del par??metro mode en WriteSchema.
//
// Par??metros:
//   fileName:
//     Nombre del archivo en el que se van a escribir los datos.
//
//   mode:
//     Uno de los valores de System.Data.XmlWriteMode.
public void WriteXml(string fileName, XmlWriteMode mode);
//
// Resumen:
//     Escribe el contenido actual del objeto System.Data.DataTable como XML utilizando
//     el objeto System.IO.TextWriter especificado.Para guardar los datos de la
//     tabla y de todos sus descendientes, establezca el par??metro writeHierarchy
//     en true.
//
// Par??metros:
//   writer:
//     Objeto System.IO.TextWriter con el que se va a escribir el contenido.
//
//   writeHierarchy:
//     Si es true, escribe el contenido de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), escribe s??lo los datos para la tabla actual.
public void WriteXml(TextWriter writer, bool writeHierarchy);
//
// Resumen:
//     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
//     System.Data.DataTable mediante el objeto System.IO.TextWriter y la enumeraci??n
//     System.Data.XmlWriteMode especificados.Para escribir el esquema, establezca
//     el valor del par??metro mode en WriteSchema.
//
// Par??metros:
//   writer:
//     Objeto System.IO.TextWriter que se utiliza para escribir el documento.
//
//   mode:
//     Uno de los valores de System.Data.XmlWriteMode.
public void WriteXml(TextWriter writer, XmlWriteMode mode);
//
// Resumen:
//     Escribe el contenido actual del objeto System.Data.DataTable como XML utilizando
//     el objeto System.Xml.XmlWriter especificado.
//
// Par??metros:
//   writer:
//     Objeto System.Xml.XmlWriter con el que se va a escribir el contenido.
//
//   writeHierarchy:
//     Si es true, escribe el contenido de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), escribe s??lo los datos para la tabla actual.
public void WriteXml(XmlWriter writer, bool writeHierarchy);
//
// Resumen:
//     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
//     System.Data.DataTable mediante el objeto System.Xml.XmlWriter y la enumeraci??n
//     System.Data.XmlWriteMode especificados.Para escribir el esquema, establezca
//     el valor del par??metro mode en WriteSchema.
//
// Par??metros:
//   writer:
//     Objeto System.Xml.XmlWriter que se utiliza para escribir el documento.
//
//   mode:
//     Uno de los valores de System.Data.XmlWriteMode.
public void WriteXml(XmlWriter writer, XmlWriteMode mode);
//
// Resumen:
//     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
//     System.Data.DataTable en el archivo indicado mediante la enumeraci??n System.Data.XmlWriteMode
//     especificada.Para escribir el esquema, establezca el valor del par??metro
//     mode en WriteSchema.Para guardar los datos de la tabla y de todos sus descendientes,
//     establezca el par??metro writeHierarchy en true.
//
// Par??metros:
//   stream:
//     Secuencia en la que se van a escribir los datos.
//
//   mode:
//     Uno de los valores de System.Data.XmlWriteMode.
//
//   writeHierarchy:
//     Si es true, escribe el contenido de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), escribe s??lo los datos para la tabla actual.
public void WriteXml(Stream stream, XmlWriteMode mode, bool writeHierarchy);
//
// Resumen:
//     Escribe los datos actuales y, de forma opcional, el esquema para el System.Data.DataTable
//     mediante el archivo y la enumeraci??n System.Data.XmlWriteMode especificados.Para
//     escribir el esquema, establezca el valor del par??metro mode en WriteSchema.Para
//     guardar los datos de la tabla y de todos sus descendientes, establezca el
//     par??metro writeHierarchy en true.
//
// Par??metros:
//   fileName:
//     Nombre del archivo en el que se van a escribir los datos.
//
//   mode:
//     Uno de los valores de System.Data.XmlWriteMode.
//
//   writeHierarchy:
//     Si es true, escribe el contenido de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), escribe s??lo los datos para la tabla actual.
public void WriteXml(string fileName, XmlWriteMode mode, bool writeHierarchy);
//
// Resumen:
//     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
//     System.Data.DataTable mediante el objeto System.IO.TextWriter y la enumeraci??n
//     System.Data.XmlWriteMode especificados.Para escribir el esquema, establezca
//     el valor del par??metro mode en WriteSchema.Para guardar los datos de la tabla
//     y de todos sus descendientes, establezca el par??metro writeHierarchy en true.
//
// Par??metros:
//   writer:
//     Objeto System.IO.TextWriter que se utiliza para escribir el documento.
//
//   mode:
//     Uno de los valores de System.Data.XmlWriteMode.
//
//   writeHierarchy:
//     Si es true, escribe el contenido de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), escribe s??lo los datos para la tabla actual.
public void WriteXml(TextWriter writer, XmlWriteMode mode, bool writeHierarchy);
//
// Resumen:
//     Escribe los datos actuales y, de forma opcional, el esquema para el objeto
//     System.Data.DataTable mediante el objeto System.Xml.XmlWriter y la enumeraci??n
//     System.Data.XmlWriteMode especificados.Para escribir el esquema, establezca
//     el valor del par??metro mode en WriteSchema.Para guardar los datos de la tabla
//     y de todos sus descendientes, establezca el par??metro writeHierarchy en true.
//
// Par??metros:
//   writer:
//     Objeto System.Xml.XmlWriter que se utiliza para escribir el documento.
//
//   mode:
//     Uno de los valores de System.Data.XmlWriteMode.
//
//   writeHierarchy:
//     Si es true, escribe el contenido de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), escribe s??lo los datos para la tabla actual.
public void WriteXml(XmlWriter writer, XmlWriteMode mode, bool writeHierarchy);
//
// Resumen:
//     Escribe en la secuencia especificada la estructura de datos actual del objeto
//     System.Data.DataTable como esquema XML.
//
// Par??metros:
//   stream:
//     Secuencia en la que se va a escribir el esquema XML.
public void WriteXmlSchema(Stream stream);
//
// Resumen:
//     Escribe en el archivo especificado la estructura de datos actual del objeto
//     System.Data.DataTable como esquema XML.
//
// Par??metros:
//   fileName:
//     Nombre del archivo que se va a utilizar.
public void WriteXmlSchema(string fileName);
//
// Resumen:
//     Escribe la estructura de datos actual del objeto System.Data.DataTable como
//     esquema XML, utilizando el objeto System.IO.TextWriter especificado.
//
// Par??metros:
//   writer:
//     System.IO.TextWriter con el que se va a escribir.
public void WriteXmlSchema(TextWriter writer);
//
// Resumen:
//     Escribe la estructura de datos actual del objeto System.Data.DataTable como
//     esquema XML, utilizando el objeto System.Xml.XmlWriter especificado.
//
// Par??metros:
//   writer:
//     Objeto System.Xml.XmlWriter que se va a utilizar.
public void WriteXmlSchema(XmlWriter writer);
//
// Resumen:
//     Escribe en la secuencia especificada la estructura de datos actual del objeto
//     System.Data.DataTable como esquema XML.Para guardar el esquema de la tabla
//     y de todos sus descendientes, establezca el par??metro writeHierarchy en true.
//
// Par??metros:
//   stream:
//     Secuencia en la que se va a escribir el esquema XML.
//
//   writeHierarchy:
//     Si es true, escribe el esquema de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), s??lo escribe el esquema de la tabla actual.
public void WriteXmlSchema(Stream stream, bool writeHierarchy);
//
// Resumen:
//     Escribe en el archivo especificado la estructura de datos actual del objeto
//     System.Data.DataTable como esquema XML.Para guardar el esquema de la tabla
//     y de todos sus descendientes, establezca el par??metro writeHierarchy en true.
//
// Par??metros:
//   fileName:
//     Nombre del archivo que se va a utilizar.
//
//   writeHierarchy:
//     Si es true, escribe el esquema de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), s??lo escribe el esquema de la tabla actual.
public void WriteXmlSchema(string fileName, bool writeHierarchy);
//
// Resumen:
//     Escribe la estructura de datos actual del objeto System.Data.DataTable como
//     esquema XML, utilizando el objeto System.IO.TextWriter especificado.Para
//     guardar el esquema de la tabla y de todos sus descendientes, establezca el
//     par??metro writeHierarchy en true.
//
// Par??metros:
//   writer:
//     System.IO.TextWriter con el que se va a escribir.
//
//   writeHierarchy:
//     Si es true, escribe el esquema de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), s??lo escribe el esquema de la tabla actual.
public void WriteXmlSchema(TextWriter writer, bool writeHierarchy);
//
// Resumen:
//     Escribe la estructura de datos actual del objeto System.Data.DataTable como
//     esquema XML, utilizando el objeto System.Xml.XmlWriter especificado.Para
//     guardar el esquema de la tabla y de todos sus descendientes, establezca el
//     par??metro writeHierarchy en true.
//
// Par??metros:
//   writer:
//     Objeto System.Xml.XmlWriter que se utiliza para escribir el documento.
//
//   writeHierarchy:
//     Si es true, escribe el esquema de la tabla actual y de todos sus descendientes.Si
//     es false (valor predeterminado), s??lo escribe el esquema de la tabla actual.
public void WriteXmlSchema(XmlWriter writer, bool writeHierarchy);
}*/
?>